@extends('layouts.admin')
@section('title', 'Users')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Users
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm text-white float-end">Add
                            User</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role_as == '1' ? 'admin' : 'user' }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="btn btn-sm btn-primary text-white">Edit</a>
                                        <a href="{{ route('admin.users.delete', $user->id) }}"
                                            onclick="return confirm('Are sure you want delete this product?')"
                                            class="btn btn-danger btn-sm text-white">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No User Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
