@extends('rider.layout')

@section('title', 'Orders')

@section('content')


            <div class="btn-group ms-5 mt-5" role="group" aria-label="Basic example">
                <a href="/rider/bookings/pending">
                    <button type="button" class="btn btn-primary">New orders</button>
                </a> 
                <a href="/rider/bookings/pick-up">
                    <button type="button" class="btn mx-1 btn-secondary">Pick-up</button>
                </a> 
                <a href="/rider/bookings/process">
                    <button type="button" class="btn mx-1 btn-secondary">Delivery</button>
                </a> 
                <a href="/rider/bookings/delivery">
                    <button type="button" class="btn btn-secondary">Delivery</button>
                </a> 
            </div>

            <main class="order-details">
                <table class="table" >
                    <thead>
                        <tr>
                        <th>Order No.</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th> </th>
                        </tr>
                    </thead>

                        @foreach ($orders as $order)
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <button class="btn btn-primary" onclick="updateViewStatusModal({{$order}})" data-bs-toggle="modal" data-bs-target="#viewStatusModal">View Details</button>
                                    <button class="btn btn-primary" onclick="updateData({{$order}})" data-bs-toggle="modal" data-bs-target="#editStatus">Proceed to process</button>
                                    <button class="btn btn-primary" onclick="updateData({{$order}})" data-bs-toggle="modal" data-bs-target="#editStatus">Edit</button>
                                </td>
                            </tr>
                        </tbody>

                        @endforeach
                    </table>
            </main>
            <div class="modal fade" id="editStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="/riderapp/update-order" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Order Status</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>Order No.: <span id="span_order_id"></span> </p>
                            <span>Weight </span>
                            <input type="text" class="form-control" placeholder="Weight sa labhonon" name="weight" value="weight" id="weight">
                            <input type="hidden" name="order_id" id="form_order_id">
                                <button class="button button1" name="status" value="pending">Pending</button>
                                <button class="button button1" name="status" value="process">Process</button>
                                <button class="button button1" name="status" value="complete">Complete</button>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                </form>
              </div>
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


    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

        function updateData(order) {
            document.getElementById('span_order_id').innerHTML = order.id
            document.getElementById('form_order_id').value = order.id
            document.getElementById('weight').value = order.weight
            console.log(order)
        }

        function updateViewStatusModal(order) {
            console.log(order)
            document.getElementById('detergent').innerHTML = order.detergent.detergent_name
            document.getElementById('name').innerHTML = order.user.name
            document.getElementById('fabric').innerHTML = order.fabric.fabric_name
            document.getElementById('view_weight7').innerHTML = order.weight + 'kg'

        }

    </script>

@endsection