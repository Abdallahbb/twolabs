<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
    public function index(){
        $userId = Auth::id();
    
        return view('user_dashboard')->with([
            'orders' => Order::where('user_id', $userId)->where('approval', 'Pending')->get(),
            'approved_orders' => Order::where('user_id', $userId)->where('approval', 'Completed')->get(),
            'order_count' => Order::where('user_id', $userId)->where('status', 'Pending')->count(),
            'all_order' => Order::where('user_id', $userId)->count(),
            'appointments' => Appointment::where('user_id', $userId)->where('status', 'Pending')->orderBy('app_date', 'asc')->get(),
            'approved_appointments' => Appointment::where('user_id', $userId)->where('status', 'Approved')->orderBy('app_date', 'asc')->get(),
            'app_count' => Appointment::where('user_id', $userId)->where('status', 'Pending')->count(),
            'approved_count' => Appointment::where('user_id', $userId)->where('status', 'Approved')->count(), // ✅ THIS LINE
        ]);
    }
    
    

    public function services()
    {
        return view('services')->with([
            'products' => Product::all(),
        ]);
    }

    public function userOrderDetails($slug)
    {
        $carts = Cart::where('order_number', $slug)->get();
        $order = Order::where('order_number', $slug)->first();

        return view('user_order_details')->with([
            'carts' => $carts,
            'order' => $order,
            'order_number' => $slug,
        ]);
    }
}
