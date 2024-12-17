<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
class OrderController extends Controller
{

    // public function index() 
    // {
    //     $orders = Order::with('product','user')->get();
    //     return view('user.order', compact('orders'));
    // }

    public function storeOrder(Request $request){
        try{
            $validatedData = $request->validate([
                'product_id' => 'required',
                'quantity' => 'required',
                'status' => 'Pending'
            ]);

            $product = Product::findOrFail($validatedData['product_id']);
            $quantity = $validatedData['quantity'];

            // Apply promotional discount logic
            if ($quantity >= 30) {
                // Pay for 28 when ordering 30
                $totalAmount = $product->category->price * 28;
            } elseif ($quantity >= 15) {
                // Pay for 14 when ordering 15
                $totalAmount = $product->category->price * 14;
            } else {
                // Regular price calculation
                $totalAmount = $product->category->price * $quantity;
            }

            $validatedData['user_id'] = Auth::id();
            $validatedData['total_amount'] = $totalAmount;
            
            Order::create($validatedData);
            
            return redirect()->route('user.order')->with('Success','Order Added Successfully');
        }
        catch(\Exception $e){
            Log::error('Order Creation: ' . $e->getMessage());
            return redirect()->route('user.sports')->with('Error','Error Adding Orders',$e->getMessage());
        }
    }

    public function index(){
        $orders = Order::with('product', 'user')
            ->where('user_id', Auth::id())
            ->whereNotIn('status', ['cancelled', 'complete'])
            ->get();
        return view('user.order', compact('orders'));
    }

    public function updateOrder(Request $request, $id){
        try{
        $order = Order::findOrFail($id);
        $order->update(['status'=>$request->status]);
        return redirect()->route('rider.bookings.pick-up')->with('Success','Order Updated Succesffully');
    }
    catch(\Exception $e){
        Log::error('Order Update: ' . $e->getMessage());
            return redirect()->route('rider.bookings.pending')->with('Error','Error Updating Orders',$e->getMessage());
        }
    }
    public function pickUpToProcess($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'pick_up']);
            
            return redirect()->route('rider.bookings.pick-up')
                ->with('success', 'Order is now being processed');
        } catch(\Exception $e) {
            Log::error('Pick Up To Process Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating order status');
        }
    }

    public function processToDelivery($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'delivery']);
            
            return redirect()->route('rider.bookings.process')
                ->with('success', 'Order is now out for delivery');
        } catch(\Exception $e) {
            Log::error('Process To Delivery Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating order status');
        }
    }

    public function markAsDelivered($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'delivered']);
            
            return redirect()->route('rider.bookings.delivery')
                ->with('success', 'Order has been marked as delivered');
        } catch(\Exception $e) {
            Log::error('Mark As Delivered Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating order status');
        }
    }

    public function cancelOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            if ($order->status === 'Pending') {
                $order->update(['status' => 'cancelled']);
                return redirect()->route('user.order')->with('success', 'Order cancelled successfully');
            }
            return redirect()->route('user.order')->with('error', 'Order cannot be cancelled at this stage');
        } catch(\Exception $e) {
            Log::error('Order Cancellation: ' . $e->getMessage());
            return redirect()->route('user.order')->with('error', 'Error cancelling order');
        }
    }

    public function confirmDelivery($id)
    {
        try {
            $order = Order::findOrFail($id);
            if ($order->status === 'delivered') {
                $order->update(['status' => 'complete']);
                return redirect()->route('user.order')->with('success', 'Delivery confirmed successfully');
            }
            return redirect()->route('user.order')->with('error', 'Order is not ready for delivery confirmation');
        } catch(\Exception $e) {
            Log::error('Delivery Confirmation: ' . $e->getMessage());
            return redirect()->route('user.order')->with('error', 'Error confirming delivery');
        }
    }
    public function readyForDelivery($id){
        $order = Order::findOrFail($id);
        $order->update(['status'=>'ready']);
        return redirect()->route('admin.order')->with('Success','Order Updated Succesffully');
    }
    public function processOrder($id){
        $order = Order::findOrFail($id);
        $order->update(['status'=>'process']);
        return redirect()->route('admin.order')->with('Success','Order Updated Succesffully');
    }
   
}
