@extends('admin.layout')

@section('title', 'Transaction History')

@section('content')
<div class="container-transaction mt-5">


    @if(isset($orders) && $orders->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price per Item</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->product->category->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>₱{{ number_format($order->product->category->price, 2) }}</td>
                            <td>₱{{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                <span class="badge {{ $order->status === 'complete' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">
                                    View Details
                                </button>
                            </td>
                        </tr>

                        <!-- Modal for Order Details -->
                        <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Order #{{ $order->id }} Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card mb-3">
                                                    <div class="card-header">
                                                        <h6>Customer Information</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <p><strong>Name:</strong> {{ $order->user->name }}</p>
                                                        <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                                        <p><strong>Contact:</strong> {{ $order->user->contact ?? 'N/A' }}</p>
                                                        <p><strong>Delivery Address:</strong> {{ $order->user->delivery_address ?? 'N/A' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mb-3">
                                            <div class="card-header">
                                                <h6>Order Information</h6>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Product:</strong> {{ $order->product->category->name }}</p>
                                                <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
                                                <p><strong>Price per Item:</strong> ₱{{ number_format($order->product->category->price, 2) }}</p>
                                                <p><strong>Total Amount:</strong> ₱{{ number_format($order->total_amount, 2) }}</p>
                                                <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                                                <p><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y h:i A') }}</p>
                                                <p><strong>Last Updated:</strong> {{ $order->updated_at->format('M d, Y h:i A') }}</p>
                                                @if($order->completed_at)
                                                    <p><strong>Delivery Completed:</strong> {{ $order->completed_at->format('M d, Y h:i A') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $orders->links() }}
        </div>
    @else
        <div class="alert alert-info" role="alert">
            No transactions found.
        </div>
    @endif
</div>
@endsection