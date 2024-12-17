@extends('rider.layout')

@section('title', 'Orders in Delivery')

@section('content')
    <div class="btn-group ms-5 mt-5" role="group" aria-label="Basic example">
        <a href="/rider/bookings/pending">
            <button type="button" class="btn btn-secondary">Ready for Pickup</button>
        </a> 
        <a href="/rider/bookings/pick-up">
            <button type="button" class="btn mx-1 btn-secondary">Pick-up</button>
        </a> 
        <a href="/rider/bookings/process">
            <button type="button" class="btn mx-1 btn-primary">Delivery</button>
        </a> 
        {{-- <a href="/rider/bookings/delivery">
            <button type="button" class="btn btn-secondary">Delivery</button>
        </a>  --}}
    </div>

    <h1 class="mt-3">Orders in Delivery</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Order No.</th>
                <th>Name</th>
                <th>Total amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (count($orders) == 0)
                <tr>
                    <td colspan="6" class="text-center">No orders in delivery.</td>
                </tr>
            @endif
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>₱{{ number_format($order->total_amount, 2) }}</td>
                    <td class="d-flex">
                        <button class="btn btn-info mx-2" data-bs-toggle="modal" data-bs-target="#viewStatusModal{{$order->id}}">View Details</button>
                        <form action="{{ url('/deliveredOrder', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-primary mx-1" type="submit">Item Delivered</button>
                        </form>
                    </td>
                </tr>
                <!-- Modal for Order Details -->
<div class="modal fade" id="viewStatusModal{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Order Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Customer Information -->
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h6 class="mb-0">Customer Information</h6>
                            </div>
                            <div class="card-body">
                                <p><strong>Name:</strong> {{ $order->user->name }}</p>
                                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                <p><strong>Contact:</strong> {{ $order->user->contact ?? 'N/A' }}</p>
                                <p><strong>Delivery Address:</strong> {{ $order->user->delivery_address ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Information -->
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-info text-white">
                                <h6 class="mb-0">Order Information</h6>
                            </div>
                            <div class="card-body">
                                <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                                <p><strong>Product:</strong> {{ $order->product->name }}</p>
                                <p><strong>Category:</strong> {{ $order->product->category->name }}</p>
                                <p><strong>Price:</strong> ₱{{ number_format($order->product->category->price, 2) }}</p>
                                <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
                                <p><strong>Total Amount:</strong> ₱{{ number_format($order->total_amount, 2) }}</p>
                                <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                            </div>
                        </div>
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
@endsection