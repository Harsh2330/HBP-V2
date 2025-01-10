@extends('layouts.app')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .create-user {
        font-family: Arial, sans-serif;
        animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .create-user h1 {
        color: #333;
        margin-bottom: 20px;
    }
    .create-user form {
        max-width: 600px;
        margin: auto;
    }
    .create-user label {
        display: block;
        margin-top: 10px;
    }
    .create-user input, .create-user select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .create-user button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .create-user button:hover {
        background-color: #0056b3;
    }
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: 10px;
        margin-top: 20px;
        border-radius: 4px;
    }
</style>

<div class="create-user container">
    <h1>Create New User</h1>

    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="usertype">User Type:</label>
        <select name="usertype" required>
            <option value="admin">Admin</option>
            <option value="doctor">Doctor</option>
            <option value="patient">Patient</option>
        </select><br>

        <button type="submit" class="btn btn-primary">Create User</button>
    </form>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>
@endsection
