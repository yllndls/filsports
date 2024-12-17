<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard() 
    {
        // Get orders by status
        $pendingOrders = Order::whereIn('status', ['pending', 'pick up'])->get();
        $processOrders = Order::where('status', 'process')->get();
        $completedOrders = Order::where('status', 'complete')->get();

        return view('admin.dashboard', [
            'pendingOrders' => $pendingOrders,
            'processOrders' => $processOrders,
            'completedOrders' => $completedOrders
        ]);
    }

    public function order()
    {
        $pendingOrders = Order::where('status', 'pending')->get();
        $this->getData($pendingOrders);
        $processOrders = Order::where('status', 'process')->get();
        $this->getData($processOrders);
        $pickUpOrders = Order::where('status', 'pick up')->get();
        $this->getData($pickUpOrders);
        $deliveryOrders = Order::where('status', 'delivery')->get();
        $this->getData($deliveryOrders);
        return view('admin.order', [
            'pickUpOrders' => $pickUpOrders,
            'pendingOrders' => $pendingOrders,
            'deliveryOrders' => $deliveryOrders,
            'processOrders' => $processOrders,
        ]);
    }

    private function getData($orders) {
        foreach($orders as $order) {
            $order->user = User::find($order->user_id);
        }
    }

    public function history() {
        $orders = Order::where('status', 'complete')->get();
        foreach($orders as $order) {
            $order->user = User::find($order->user_id);
        }
        return view('admin.history', ['orders' =>  $orders]);
    }
}

