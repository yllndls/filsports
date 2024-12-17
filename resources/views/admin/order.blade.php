@extends('admin.layout')

@section('title', 'Orders')

@section('content')

            <table class="table" >
                <thead>
                    <tr>
                        <th colspan="5" class="h4 text-center">Process</th>
                    </tr>
                    <tr>
                        <th>Bookings No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Total amount</th>
                        <th> Actions</th>
                    </tr>
                </thead>
                @if (count($processOrders) == 0)
                <tbody>
                    <tr>
                        <td colspan="5" class="text-center">No data found.</td>
                    </tr>
                </tbody>
            @endif
                @foreach ($processOrders as $order)
                    <tbody>
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->user->email }}</td>
                            <td> {{$order->total_amount}} </td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewStatusModal{{$order->id}}">View Details</button>
                                {{-- <button class="btn btn-primary" onclick="updateData({{$order}})" data-bs-toggle="modal" data-bs-target="#editStatus">Update Status</button> --}}
                                <form action="{{url('readyForDelivery', $order->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="ready">
                                    <button class="btn btn-primary mr-2 mx-1" type="submit">Ready for delivery</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    <div class="modal fade" id="viewStatusModal{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5 " id="exampleModalLabel">Order or booking details?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                      
                              <div class="modal-body checkout  ">
                                <div class="payment-detail">
                                  <div class="details-body">
                                    Detergent :
                                  </div>
                                  <div class="details-body" id="detergent">
                                    {{$order->detergent->detergent_name ?? 'None'}}
                                  </div>
                                  <input type="hidden" name="detergent_id" id="form_detergent_id">
                                  
                                </div>
                                <div class="payment-detail ">
                                  <div class="details-body">
                                    Fabric Conditioner : 
                                  </div>
                                  <div class="details-body" id="fabric">
                                    {{$order->fabric->fabric_name ?? 'None'}}
                                  </div>
                                  <input type="hidden" name="fabric_id" id="form_fabric_id">
                                  
                                </div>
                                <div class="payment-detail ">
                                  <div class="details-body" id="weightInModal">
                                     {{$order->weight}} kilo
                                  </div>
                                  <input type="hidden" name="weight" id="form_weight">
                                  
                                  <div class="details-body" id="sub_total">
                                    {{ $order->weight * 250 }}
                                  </div>
                                </div>
                              <hr>
                                <div class="payment">
                                 <label for="payment">Payment Method</label>
                                 
                                    <select id="payment" name="payment_option" id="form_payment_option">
                                      <option value=""></option>
                                      <option value="cash on delivery" {{$order->payment_option == 'cash on delivery' ? 'selected' : ''}} >Cash on Delivery</option>
                                      <option value="gcash" {{$order->payment_option == 'gcash' ? 'selected' : ''}}>GCash</option>
                                    </select>
                                </div>
                                  <hr>
                                  <h5>Payment Details</h5>
                                  <div class="payment-detail ">
                                    <div class="details-body">
                                       Sub-total:
                                    </div>
                                    <div class="details-body " id="sub_total2">
                                      {{ $order->weight * 250 }}
                                    </div>
                                  </div>
                                  <div class="payment-detail">
                                    <div class="details-body ">
                                       Delivery Fee:
                                    </div>
                                    <div class="details-body ">
                                      50
                                    </div>
                                  </div>
                                  <hr>
                                   <div class="totalpayment">
                                    <div class="payment-total">
                                      Total Amount:
                                  </div>
                                  <div class="payment-total" id="total_amount">
                                      {{ $order->weight * 250 + 50 }}
                                </div>
                                <input type="hidden" id="form_total_amount" name="total_amount">
                                   </div>
                              </div>
                              <div class="modal-footer p-1">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              </div>
                            </div>
                          </div>
                      </div>
                  @endforeach
            </table>

            {{-- <main class="order-details"> --}}
                <table class="table" >
                    <thead>
                        <tr>
                            <th colspan="5" class="h4 text-center">Pending Orders</th>
                        </tr>
                        <tr>
                            <th>Bookings No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Total amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                        @if (count($pendingOrders) == 0)
                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-center">No data found.</td>
                                </tr>
                            </tbody>
                        @endif
                        @foreach ($pendingOrders as $order)
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->user->email }}</td>
                                <td> {{$order->total_amount}} </td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewStatusModal{{$order->id}}">View Details</button>
                                    {{-- <button class="btn btn-primary" onclick="updateData({{$order}})" data-bs-toggle="modal" data-bs-target="#editStatus">Update Status</button> --}}
                                    <form action="{{url('processOrder', $order->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="processing">
                                        <button class="btn btn-primary mr-2 mx-1" type="submit">Process the order</button>
                                    </form>
                                </td>
                            </tr>
                      </tbody>
                      <div class="modal fade" id="viewStatusModal{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5 " id="exampleModalLabel">Order or booking details?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                      
                              <div class="modal-body checkout  ">
                                <div class="payment-detail">
                                  <div class="details-body">
                                    Detergent :
                                  </div>
                                  <div class="details-body" id="detergent">
                                    {{$order->detergent->detergent_name ?? 'None'}}
                                  </div>
                                  <input type="hidden" name="detergent_id" id="form_detergent_id">
                                  
                                </div>
                                <div class="payment-detail ">
                                  <div class="details-body">
                                    Fabric Conditioner : 
                                  </div>
                                  <div class="details-body" id="fabric">
                                      {{$order->fabric->fabric_name ?? "None"}}
                                  </div>
                                  <input type="hidden" name="fabric_id" id="form_fabric_id">
                                  
                                </div>
                                <div class="payment-detail ">
                                  <div class="details-body" id="weightInModal">
                                     {{$order->weight}} kilo
                                  </div>
                                  <input type="hidden" name="weight" id="form_weight">
                                  
                                  <div class="details-body" id="sub_total">
                                    {{ $order->weight * 250 }}
                                  </div>
                                </div>
                              <hr>
                                <div class="payment">
                                 <label for="payment">Payment Method</label>
                                 
                                    <select id="payment" name="payment_option" id="form_payment_option">
                                      <option value=""></option>
                                      <option value="cash on delivery" {{$order->payment_option == 'cash on delivery' ? 'selected' : ''}} >Cash on Delivery</option>
                                      <option value="gcash" {{$order->payment_option == 'gcash' ? 'selected' : ''}}>GCash</option>
                                    </select>
                                </div>
                                  <hr>
                                  <h5>Payment Details</h5>
                                  <div class="payment-detail ">
                                    <div class="details-body">
                                       Sub-total:
                                    </div>
                                    <div class="details-body " id="sub_total2">
                                      {{ $order->weight * 250 }}
                                    </div>
                                  </div>
                                  <div class="payment-detail">
                                    <div class="details-body ">
                                       Delivery Fee:
                                    </div>
                                    <div class="details-body ">
                                      50
                                    </div>
                                  </div>
                                  <hr>
                                   <div class="totalpayment">
                                    <div class="payment-total">
                                      Total Amount:
                                  </div>
                                  <div class="payment-total" id="total_amount">
                                      {{ $order->weight * 250 + 50 }}
                                </div>
                                <input type="hidden" id="form_total_amount" name="total_amount">
                                   </div>
                              </div>
                              <div class="modal-footer p-1">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              </div>
                            </div>
                          </div>
                      </div>
                      @endforeach
                    </table>
            {{-- </main> --}}
           

            <table class="table" >
                <thead>
                    <tr>
                        <th colspan="5" class="h4 text-center">Delivery</th>
                    </tr>
                    <tr>
                        <th>Bookings No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Total amount</th>
                        <th> Actions</th>
                    </tr>
                </thead>
                @if (count($deliveryOrders) == 0)
                <tbody>
                    <tr>
                        <td colspan="5" class="text-center">No data found.</td>
                    </tr>
                </tbody>
            @endif
                @foreach ($deliveryOrders as $order)
                    <tbody>
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->user->email }}</td>
                            <td> {{$order->total_amount}} </td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewStatusModal{{$order->id}}">View Details</button>
                                {{-- <button class="btn btn-primary" onclick="updateData({{$order}})" data-bs-toggle="modal" data-bs-target="#editStatus">Update Status</button> --}}
                            </td>
                        </tr>
                    </tbody>
                    <div class="modal fade" id="viewStatusModal{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5 " id="exampleModalLabel">Order or booking details?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                      
                              <div class="modal-body checkout  ">
                                <div class="payment-detail">
                                  <div class="details-body">
                                    Detergent :
                                  </div>
                                  <div class="details-body" id="detergent">
                                    {{$order->detergent->detergent_name ?? 'None'}}
                                  </div>
                                  <input type="hidden" name="detergent_id" id="form_detergent_id">
                                  
                                </div>
                                <div class="payment-detail ">
                                  <div class="details-body">
                                    Fabric Conditioner : 
                                  </div>
                                  <div class="details-body" id="fabric">
                                      {{$order->fabric->fabric_name ?? 'None'}}
                                  </div>
                                  <input type="hidden" name="fabric_id" id="form_fabric_id">
                                  
                                </div>
                                <div class="payment-detail ">
                                  <div class="details-body" id="weightInModal">
                                     {{$order->weight}} kilo
                                  </div>
                                  <input type="hidden" name="weight" id="form_weight">
                                  
                                  <div class="details-body" id="sub_total">
                                    {{ $order->weight * 250 }}
                                  </div>
                                </div>
                              <hr>
                                <div class="payment">
                                 <label for="payment">Payment Method</label>
                                 
                                    <select id="payment" name="payment_option" id="form_payment_option">
                                      <option value=""></option>
                                      <option value="cash on delivery" {{$order->payment_option == 'cash on delivery' ? 'selected' : ''}} >Cash on Delivery</option>
                                      <option value="gcash" {{$order->payment_option == 'gcash' ? 'selected' : ''}}>GCash</option>
                                    </select>
                                </div>
                                  <hr>
                                  <h5>Payment Details</h5>
                                  <div class="payment-detail ">
                                    <div class="details-body">
                                       Sub-total:
                                    </div>
                                    <div class="details-body " id="sub_total2">
                                      {{ $order->weight * 250 }}
                                    </div>
                                  </div>
                                  <div class="payment-detail">
                                    <div class="details-body ">
                                       Delivery Fee:
                                    </div>
                                    <div class="details-body ">
                                      50
                                    </div>
                                  </div>
                                  <hr>
                                   <div class="totalpayment">
                                    <div class="payment-total">
                                      Total Amount:
                                  </div>
                                  <div class="payment-total" id="total_amount">
                                      {{ $order->weight * 250 + 50 }}
                                </div>
                                <input type="hidden" id="form_total_amount" name="total_amount">
                                   </div>
                              </div>
                              <div class="modal-footer p-1">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              </div>
                            </div>
                          </div>
                      </div>
                  @endforeach
            </table>

            {{-- <table class="table" >
                <thead>
                    <tr>
                        <th colspan="5" class="h4 text-center">Completed</th>
                    </tr>
                    <tr>
                        <th>Bookings No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Total amount</th>
                        <th> Actions</th>
                    </tr>
                </thead>

                @foreach ($completeOrders as $order)
                    <tbody>
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->user->email }}</td>
                            <td> {{$order->total_amount}} </td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewStatusModal{{$order->id}}">View Details</button>
                            </td>
                        </tr>
                    </tbody>
                  @endforeach
            </table> --}}

            


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