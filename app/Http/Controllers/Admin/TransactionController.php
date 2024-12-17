<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with(['user', 'rider', 'product.category'])
            ->where('status', 'complete')
            ->when($request->search, function ($query, $search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhere('id', 'like', "%{$search}%");
            })
            ->when($request->date_from, function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->date_from);
            })
            ->when($request->date_to, function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->date_to);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $totalTransactions = $orders->total();
        $totalAmount = Order::where('status', 'complete')->sum('total_amount');

        return view('admin.transaction', compact('orders', 'totalTransactions', 'totalAmount'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'rider', 'product.category'])
            ->findOrFail($id);
        
        return view('admin.transaction-details', compact('order'));
    }
}
