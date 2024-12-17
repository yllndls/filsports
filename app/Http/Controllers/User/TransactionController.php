<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with(['product.category', 'rider'])
            ->where('user_id', Auth::id())
            ->where('status', 'complete')
            ->when($request->date_from, function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->date_from);
            })
            ->when($request->date_to, function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->date_to);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $totalOrders = $orders->total();
        $totalSpent = Order::where('user_id', Auth::id())
            ->where('status', 'complete')
            ->sum('total_amount');

        return view('user.transactions', compact('orders', 'totalOrders', 'totalSpent'));
    }

    public function show($id)
    {
        $order = Order::with(['product.category', 'rider'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('user.transaction-details', compact('order'));
    }
}
