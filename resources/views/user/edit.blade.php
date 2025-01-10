@extends('layouts.app')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .edit-user {
        font-family: Arial, sans-serif;
        animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .edit-user h1 {
        color: #333;
        margin-bottom: 20px;
    }
    .edit-user form {
        max-width: 600px;
        margin: auto;
    }
    .edit-user label {
        display: block;
        margin-top: 10px;
    }
    .edit-user input, .edit-user select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .edit-user button {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .edit-user button:hover {
        background-color: #218838;
    }
</style>

<div class="edit-user container">
    <h1>Edit User</h1>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $user->name }}" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password"><br>

        <label for="usertype">User Type:</label>
        <select name="usertype" required>
            <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="doctor" {{ $user->usertype == 'doctor' ? 'selected' : '' }}>Doctor</option>
            <option value="patient" {{ $user->usertype == 'patient' ? 'selected' : '' }}>Patient</option>
        </select><br>

        <button type="submit" class="btn btn-success">Update User</button>
    </form>
</div>
@endsection
