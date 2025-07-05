<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\orders as MailOrder;

class Orders extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('approval', 'Pending')->get();
        return view('shop_pending_orders')->with([
            'orders' => $orders
        ]);
    }

    public function complete()
    {
        $orders = Order::where('approval', 'Completed')->get();
        return view('shop_orders')->with([
            'orders' => $orders
        ]);
    }

    public function details($slug){
        $carts = Cart::where('order_number',$slug)->get();
        $order = Order::where('order_number',$slug)->first();

        return view('order_details')->with([
            'carts'=>$carts,
            'order'=>$order,
            'order_number'=>$slug,
        ]);

    }

    public function approveOrder(Request $request){
        $order = Order::where('order_number',$request->order_number)->first();

        $order->update([
            'approval' => 'Completed'
        ]);


        try {
            Mail::to($order->user->email)->send(new MailOrder($order, 'Order was approved', 'Your order was approved'));
        } catch (\Exception $e) {
            Log::error("message", $e->getMessage());
        } finally {
            return redirect()->route('dashboard')->with('success', 'Order was Approved successfully');
        }
        return redirect()->route('dashboard')->with('success', 'Order has been approved');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
