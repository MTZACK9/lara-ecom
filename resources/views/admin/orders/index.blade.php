@extends('layouts.admin')

@section('title', 'My Orders')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Orders</h3>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="filterDate">Filter By Date</label>
                                <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="filterDate">Filter By Status</label>
                                <select name="status" class="form-select">
                                    <option selected value="">select all status</option>
                                    <option value="in progress"
                                        {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }}>
                                        Completed</option>
                                    <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="canceled" {{ Request::get('status') == 'canceled' ? 'selected' : '' }}>
                                        Canceled</option>
                                    <option value="out-for-delivery"
                                        {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>Out For
                                        Delivery</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <button type="submit" class="btn btn-sm btn-danger text-white"><small
                                        class="mdi mdi-magnify"></small></button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Tracking No</th>
                                    <th>Username</th>
                                    <th>Payment Mode</th>
                                    <th>Ordered Date</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->tracking_no }}</td>
                                        <td>{{ $order->fullname }}</td>
                                        <td>{{ $order->payment_mode }}</td>
                                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $order->status_message }}</td>
                                        <td>
                                            <a href="{{ route('admin.showOrder', $order->id) }}"
                                                class="btn btn-sm btn-danger text-white">
                                                <small class="mdi mdi-eye"></small>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Order Yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
