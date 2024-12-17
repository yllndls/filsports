@extends('admin.layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row mt-4">
    <!-- New Orders Card -->
    <div class="col-md-4 mb-4">
        <div class="card {{ $completedOrders->count() > 0 ? 'border-left-success' : '' }}">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Completed Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $completedOrders->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="{{ route('admin.order') }}" class="btn btn-success btn-sm mt-3">View Completed</a>
            </div>
        </div>
    </div>

    <!-- Processing Orders Card -->
    <div class="col-md-4 mb-4">
        <div class="card {{ $processOrders->count() > 0 ? 'border-left-warning' : '' }}">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Processing Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $processOrders->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                        @if($processOrders->count() > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                                {{ $processOrders->count() }}
                            </span>
                        @endif
                    </div>
                </div>
                <a href="{{ route('admin.order') }}" class="btn btn-warning btn-sm mt-3">View Processing</a>
            </div>
        </div>
    </div>

    <!-- Completed Orders Card -->

    <div class="col-md-4 mb-4">
        <div class="card {{ $pendingOrders->count() > 0 ? 'border-left-primary' : '' }}">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            New Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingOrders->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        @if($pendingOrders->count() > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $pendingOrders->count() }}
                                <span class="visually-hidden">new orders</span>
                            </span>
                        @endif
                    </div>
                </div>
                <a href="{{ route('admin.order') }}" class="btn btn-primary btn-sm mt-3">View Orders</a>
            </div>
        </div>
    </div>

</div>



<script>
// Check for new orders every 30 seconds
setInterval(function() {
    fetch('/admin/check-new-orders')
        .then(response => response.json())
        .then(data => {
            if (data.newOrders > 0) {
                // Play notification sound
                const audio = new Audio('/notification.mp3');
                audio.play();
                
                // Show browser notification if permitted
                if (Notification.permission === "granted") {
                    new Notification("New Order!", {
                        body: `You have ${data.newOrders} new order(s)`,
                        icon: "/favicon.ico"
                    });
                }
            }
        });
}, 30000);

// Request notification permission on page load
document.addEventListener('DOMContentLoaded', function() {
    if (Notification.permission !== "granted") {
        Notification.requestPermission();
    }
});
</script>

@endsection

