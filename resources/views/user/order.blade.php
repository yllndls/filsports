@extends('user.sidebar')

@section('title', 'My Orders')

@section('content')

<!--order start-->
<main class="order-details mt-5">
<table class="table" >
  <thead>
  <tr>
    <th>Order No.</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Category</th>
    <th>Status</th>
    <th>Quantity</th>
    <th>Total</th>
    
  </tr>
  </thead>
  
  
  <tbody>
    
  @foreach ($orders as $order)
  <tr>
  
    <td> {{ $order->id }} </td>
    <td> {{ $order->product->name ?? 'N/A' }} </td>
    <td> 
        @if($order->product && $order->product->category)
            {{ number_format($order->product->category->price, 2) }}
        @else
            N/A
        @endif
    </td>
    <td> {{ $order->product->category->name ?? 'N/A' }} </td>
    <td>
        @if($order->status === 'Pending')
            <form action="{{ route('order.cancel', $order->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this order?')">
                    Cancel Order
                </button>
            </form>
        @elseif($order->status === 'delivered')
            <form action="{{ route('order.confirm-delivery', $order->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success">
                    Confirm Delivery
                </button>
            </form>
        @else
            <span class="badge 
                @if($order->status === 'pick up') bg-info
                @elseif($order->status === 'process') bg-warning
                @elseif($order->status === 'complete') bg-success
                @elseif($order->status === 'cancelled') bg-danger
                @else bg-secondary
                @endif">
                {{ ucfirst($order->status) }}
            </span>
        @endif
    </td>
    <td>{{$order->quantity}}</td>
    <td>{{$order->total_amount}}</td>
  </tr>
  @endforeach

  </tbody>
 
</table>
</main>

  <div class="modal fade " id="statusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Status</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <section class="step-book">
            <div class="step-book-list">
              <li class="step-book-item" id="status1">
                <span class="progress-count">1</span>
                <span class="progress-label">Pending</span>
              </li>
        
              <li class="step-book-item" id="status2">
                <span class="progress-count">2</span>
                <span class="progress-label">Pick-up</span>
              </li>
        
              <li class="step-book-item" id="status3">
                <span class="progress-count">3</span>
                <span class="progress-label">Process</span>
              </li>
        
              <li class="step-book-item" id="status4">
                <span class="progress-count">4</span>
                <span class="progress-label">Delivered</span>
              </li>
        
              <li class="step-book-item" id="status5">
                <span class="progress-count">5</span>
                <span class="progress-label">Complete</span>
              </li>
            </div>
          </section>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!--order end-->

@endsection