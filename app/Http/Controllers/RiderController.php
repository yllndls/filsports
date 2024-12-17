<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class RiderController extends Controller
{
    public function dashboard(){
        $completed_orders = Order::where('status', 'complete')->count();
        $new_orders = Order::whereIn('status', ['ready', 'process'])->count();
        $in_progress = Order::where('status', 'delivery')->count();

        return view('rider.dashboard', 
        [
            'completed_orders' => $completed_orders,
            'new_orders' => $new_orders,
            'in_progress' => $in_progress
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required|min:8|max:45'
        ]);

        Rider::create($data);
        return back();
    }

    public function pending() {
        $orders = Order::where('status', 'ready')
            ->with(['user', 'product.category'])
            ->get();
        
        return view('rider.bookings.pending', ['orders' => $orders]);
    }
   
    public function pick_up() {
        $orders = Order::where('status', 'pick_up')
            ->with(['user', 'product.category'])
            ->get();
        
        return view('rider.bookings.pick-up', ['orders' => $orders]);
    }

    public function process() {
        $orders = Order::where('status', 'delivery')
            ->with(['user', 'product.category'])
            ->get();
        
        return view('rider.bookings.process', ['orders' => $orders]);
    }

    public function delivery() {
        $orders = Order::where('status', 'delivery')
            ->with(['user', 'product.category'])
            ->get();
        
        return view('rider.bookings.delivery', ['orders' => $orders]);
    }

    public function login() {
        return view ('rider.auth.login');
    }

    public function history() {
        $orders = Order::where('status', 'complete')
            ->with(['user', 'product.category'])
            ->orderBy('created_at', 'desc')
            ->get() ?? collect([]);
        
        return view('rider.transaction-history', compact('orders'));
    }

    public function deliveredOrder($id){
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'delivered']);

            $orders = Order::where('status', 'delivery')
                ->with(['user', 'product.category'])
                ->get() ?? collect([]);

            return redirect()->route('rider.bookings.process')
                ->with('success', 'Order marked as delivered')
                ->with('orders', $orders);

        } catch(\Exception $e) {
            Log::error('Delivery Update: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error updating delivery status');
        }
    }
    public function logoutRider(Request $request) 
    {
        Auth::guard('rider')->logout();
        return redirect()->route('rider.login');

    }
    public function deliveryView(){
        return view('rider.bookings.delivery');
    }

    public function bookings()
    {
        // Redirect to pending orders by default
        return redirect()->route('rider.bookings.pending');
    }
}