<?php

namespace App\Http\Controllers;

use App\Models\{Cart as Carts, Order, Product};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Mail};
use App\Mail\orders as MailOrder;

class Cart extends Controller
{
    public function index()
    {
        return view('cart')->with([
            'carts' => Carts::where('completed', '0')->where('user_id', Auth::id())->get(),
        ]);
    }

    public function addToCart(Request $request, Carts $cart)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'product_id' => 'required|integer|exists:products,id',
            'user_id' => 'required|integer',
        ]);

        $product = Product::find($validated['product_id']);

        if ($product->quantity < $validated['quantity']) {
            return redirect()->back()->withErrors('Not enough stock for this product.');
        }

        $validated['price'] = $validated['quantity'] * $validated['price'];
        $cart->create($validated);

        return redirect()->back()->withSuccess('Item added to cart successfully');
    }

    public function updateCart(Request $request)
    {
        $productId = $request->query('id');
        $quantity = $request->query('quantity');
        $userId = Auth::id();

        $cartItem = Carts::where('product_id', $productId)
            ->where('user_id', $userId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();

            return response()->json(['success' => true, 'message' => 'Cart quantity updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Cart item not found']);
    }

    public function cartplus(Request $request)
    {
        $productId = $request->product_id;
        $userId = Auth::id();

        $product = Product::find($productId);
        $cartItem = Carts::where('product_id', $productId)
            ->where('user_id', $userId)
            ->where('completed', '0')
            ->first();

        if ($cartItem && $cartItem->quantity < $product->quantity) {
            $cartItem->quantity += 1;
            $cartItem->price = $product->price * $cartItem->quantity;
            $cartItem->save();

            return redirect()->back()->withSuccess('Cart updated');
        }

        return redirect()->back()->withErrors("Cannot increase quantity beyond stock available");
    }

    public function cartminus(Request $request)
    {
        $productId = $request->product_id;
        $userId = Auth::id();

        $product = Product::find($productId);
        $cartItem = Carts::where('product_id', $productId)
            ->where('user_id', $userId)
            ->where('completed', '0')
            ->first();

        if ($cartItem && $cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->price = $product->price * $cartItem->quantity;
            $cartItem->save();

            return redirect()->back()->withSuccess('Cart updated');
        }

        return redirect()->back()->withErrors("Minimum quantity is 1");
    }

    public function checkout(Request $request)
    {
        $id = Auth::id();
        $user = Auth::user();

        $carts = Carts::where('user_id', $id)
            ->where('completed', '0')
            ->where('order_number', null)
            ->with('product')
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->withErrors("Your cart is empty.");
        }

        $total = 0;
        $order = Order::create([
            'order_number' => str_pad(rand(0, pow(10, 10) - 1), 10, '0', STR_PAD_LEFT),
            'user_id' => $id,
            'status' => 'Pending',
            'cost' => 0,
        ]);

        foreach ($carts as $cart) {
            if ($cart->product->quantity < $cart->quantity) {
                return redirect()->back()->withErrors("Not enough stock for {$cart->product->name}.");
            }

            $cart->product->quantity -= $cart->quantity;
            $cart->product->save();

            $total += $cart->price;
            $cart->update([
                'completed' => '1',
                'order_number' => $order->order_number,
            ]);
        }

        $order->update(['cost' => $total]);

        try {
            Mail::to('aaballahbb@gmail.com')->send(new MailOrder($order, 'Order placed by customer', 'An order has been placed'));
        } catch (\Exception $e) {}

        try {
            $reference = uniqid('MONNIFY_');
            $authKey = base64_encode(env('MONNIFY_API_KEY') . ':' . env('MONNIFY_SECRET_KEY'));
            $response = \Http::withHeaders([
                'Authorization' => "Basic $authKey",
                'Content-Type' => 'application/json',
            ])->post("https://sandbox.monnify.com/api/v1/merchant/transactions/init-transaction", [
                'amount' => $total,
                'customerName' => $user->name,
                'customerEmail' => $user->email,
                'paymentReference' => $reference,
                'paymentDescription' => 'Cart Checkout',
                'currencyCode' => 'NGN',
                'contractCode' => env('MONNIFY_CONTRACT_CODE'),
                'redirectUrl' => route('payment.callback'),
            ]);

            if ($response->successful() && isset($response['responseBody']['checkoutUrl'])) {
                return redirect($response['responseBody']['checkoutUrl']);
            }

            return redirect()->route('user_dashboard')->withErrors("Payment initialization failed. Please try again.");
        } catch (\Exception $e) {
            return redirect()->route('user_dashboard')->withErrors("Unexpected error during payment.");
        }
    }

    public function handleCallback(Request $request)
    {
        $transactionRef = $request->query('paymentReference');
        $userId = Auth::id();

        return view('user_dashboard', [
            'message' => 'Payment completed successfully.',
            'reference' => $transactionRef,
            'orders' => Order::where('user_id', $userId)->where('approval', 'Pending')->get(),
            'order_count' => Order::where('user_id', $userId)->where('approval', 'Pending')->count(),
            'approved_orders' => Order::where('user_id', $userId)->where('approval', 'Approved')->get(),
            'all_order' => Order::where('user_id', $userId)->count(),
            'approved_count' => \App\Models\Appointment::where('user_id', $userId)->where('status', 'Approved')->count(),
            'app_count' => \App\Models\Appointment::where('user_id', $userId)->where('status', 'Pending')->count(),
            'approved_appointments' => \App\Models\Appointment::where('user_id', $userId)->where('status', 'Approved')->get(),
            'appointments' => \App\Models\Appointment::where('user_id', $userId)->where('status', 'Pending')->get(),
        ]);
    }

    public function destroy($id)
    {
        $cart = Carts::find($id);

        if ($cart) {
            $cart->delete();
            return redirect()->back()->withSuccess("Cart deleted successfully");
        }

        return redirect()->back()->withErrors("Unable to delete item");
    }

    public function create() {}
    public function store(Request $request) {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
}
