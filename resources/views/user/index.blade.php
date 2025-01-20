@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Management</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User List</h3>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">Create New User</a>

                            <form method="GET" action="{{ route('admin.user.index') }}" class="mb-3">
                                <input type="text" name="search" placeholder="Search users..." class="form-control" value="{{ request('search') }}">
                            </form>

                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Unique ID</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->usertype }}</td>
                                            <td>{{ $user->unique_id }}</td>
                                            <td>
                                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
