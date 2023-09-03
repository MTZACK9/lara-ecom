@extends('layouts.app')

@section('title', 'My Order')

@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-danger">
                            <i class="fa fa-shopping-cart"></i> My order Detail
                            <a href="{{ route('order') }}" class="btn btn-sm btn-danger text-white float-end">BACK</a>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>
                                    Order Details
                                </h5>
                                <hr>
                                <h6 class="mt-3">Order Id : {{ $order->id }}</h6>
                                <h6 class="mt-3">Tracking Id/No. : {{ $order->tracking_no }}</h6>
                                <h6 class="mt-3">Ordered Date : {{ $order->created_at->format('d-m-Y') }}</h6>
                                <h6 class="mt-3">Payment Mode : {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success mt-3">
                                    Order Status Message : <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>
                                    User Details
                                </h5>
                                <hr>
                                <h6 class="mt-3">Full Name : {{ $order->fullname }}</h6>
                                <h6 class="mt-3">Email Address : {{ $order->email }}</h6>
                                <h6 class="mt-3">Phone : {{ $order->phone }}</h6>
                                <h6 class="mt-3">Address : {{ $order->address }}</h6>
                                <h6 class="mt-3">Pin Code : {{ $order->pincode }}</h6>
                            </div>
                        </div>
                        <br>
                        <h5>Order Items</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered  text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">Item ID</th>
                                        <th scope="col" class="border-0 bg-light">Image</th>
                                        <th scope="col" class="border-0 bg-light">Product</th>
                                        <th scope="col" class="border-0 bg-light">Price</th>
                                        <th scope="col" class="border-0 bg-light">Quantity</th>
                                        <th scope="col" class="border-0 bg-light">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($order->orderItems as $orderItem)
                                        <tr>
                                            <td>{{ $orderItem->id }}</td>
                                            <td>
                                                @if ($orderItem->product->productImages)
                                                    <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                        width="50" class="img-fluid rounded shadow-sm" />
                                                @else
                                                    <img src="" alt="" srcset="">
                                                @endif

                                            </td>
                                            <td>
                                                {{ $orderItem->product->name }}

                                                @if ($orderItem->productColor)
                                                    @if ($orderItem->productColor->color)
                                                        <span>- Color: {{ $orderItem->productColor->color->name }}</span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                ${{ $orderItem->price }}
                                            </td>
                                            <td>
                                                {{ $orderItem->quantity }}
                                            </td>
                                            <td class="fw-bold">
                                                ${{ $orderItem->quantity * $orderItem->price }}
                                                @php
                                                    $totalPrice += $orderItem->quantity * $orderItem->price;
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">
                                            Total Amount:
                                        </td>
                                        <td class="fw-bold">
                                            ${{ $totalPrice }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- <div class="text-center">
                                {{ $orders->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
