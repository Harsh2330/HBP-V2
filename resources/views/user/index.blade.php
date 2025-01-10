@extends('layouts.app')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .user-management {
        font-family: Arial, sans-serif;
        animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .user-management h1 {
        color: #333;
        margin-bottom: 20px;
    }
    .user-management table {
        width: 100%;
        border-collapse: collapse;
    }
    .user-management th, .user-management td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    .user-management th {
        background-color: #f2f2f2;
        text-align: left;
    }
    .user-management a {
        color:rgb(255, 255, 255);
        text-decoration: none;
    }
    .user-management a:hover {
        text-decoration: underline;
    }
    .user-management button {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .user-management button:hover {
        background-color: #c82333;
    }
</style>

<div class="user-management container">
    <h1>User Management</h1>
    <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">Create New User</a>

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->usertype }}</td>
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
</div>
@endsection
