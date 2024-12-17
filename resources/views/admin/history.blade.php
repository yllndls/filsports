@extends('admin.layout')

@section('title', 'Transaction History')

@section('content')

            <main class="order-details">
                <table class="table" >
                    <thead>
                      <tr>
                        <th>Order No.</th>
                        <th>Name</th>
                        <th>Total amount</th>
                        <th> </th>
                      </tr>
                    </thead>

                        <tbody>
							@if (count($orders) == 0)
								<tr>
									<td colspan="5" class="text-center"> No data found. </td>
								</tr>
							@endif
							@foreach ($orders as $order)

                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->total_amount }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewStatusModal{{$order->id}}">View Details</button>
                                    {{-- <button class="btn btn-primary" onclick="updateData({{$order}})" data-bs-toggle="modal" data-bs-target="#editStatus">Update Status</button> --}}
                                </td>
                            </tr>

            @endforeach
					            </tbody>
                    </table>
            </main>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

        function updateData(order) {
            document.getElementById('span_order_id').innerHTML = order.id
            document.getElementById('form_order_id').value = order.id
            console.log(order)
        }

    </script>

@endsection