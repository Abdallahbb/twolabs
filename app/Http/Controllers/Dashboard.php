<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard')->with([
            'total_products' => Product::count(),
            'income' => Order::sum('cost'),
            'pending_orders' => Order::where('approval', 'Pending')->count(),
            'orders' => Order::where('approval', 'Pending')->get(),
            'pending_appointments' => Appointment::where('status', 'Pending')->count(),
            'appointments' => Appointment::where('status', 'Pending')->get(),
        ]);
    }

    // Confirm order (only updates the status column)
    public function confirmOrder(Request $request)
    {
        $order = Order::find($request->order_id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found!');
        }

        $order->status = 'Approved';
        $order->save();

        return redirect()->back()->with('success', 'Order has been confirmed.');
    }

    // Cancel order (deletes the record)
    public function cancelOrder(Request $request)
    {
        $order = Order::find($request->order_id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found!');
        }

        $order->delete();

        return redirect()->back()->with('success', 'Order has been canceled.');
    }
}
