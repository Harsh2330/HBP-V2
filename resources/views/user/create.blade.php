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
        <div class="form__div form__div-one">
            <div class="form__icon">
                <i class='bx bx-user-circle'></i>
            </div>
            <div class="form__div-input">
                <label for="" class="form__label">First Name</label>
                <input class="form__input" type="text" name="first_name" required>
                @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__div">
            <div class="form__icon">
                <i class='bx bx-user-circle'></i>
            </div>
            <div class="form__div-input">
                <label for="" class="form__label">Middle Name</label>
                <input class="form__input" type="text" name="middle_name">
                @error('middle_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__div">
            <div class="form__icon">
                <i class='bx bx-user-circle'></i>
            </div>
            <div class="form__div-input">
                <label for="" class="form__label">Last Name</label>
                <input class="form__input" type="text" name="last_name" required>
                @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__div">
            <div class="form__icon">
                <i class='bx bx-calendar'></i>
            </div>
            <div class="form__div-input">
                <label for="" class="form__label">Date of Birth</label>
                <input class="form__input" type="date" name="date_of_birth" required>
                @error('date_of_birth')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__div">
            <div class="form__icon">
                <i class='bx bx-phone'></i>
            </div>
            <div class="form__div-input">
                <label for="" class="form__label">Phone Number</label>
                <input class="form__input" type="text" name="phone_number" required>
                @error('phone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__div">
            <div class="form__icon">
                <i class='bx bx-envelope'></i>
            </div>
            <div class="form__div-input">
                <label for="" class="form__label">Email</label>
                <input class="form__input" type="email" name="email" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__div">
            <div class="form__icon">
                <i class='bx bx-lock' ></i>
            </div>
            <div class="form__div-input">
                <label for="" class="form__label">Password</label>
                <input type="password" class="form__input" name="password" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__div">
            <div class="form__icon">
                <i class='bx bx-user'></i>
            </div>
            <div class="form__div-input">
                <label for="" class="form__label">User Type</label>
                <select class="form__input" name="usertype" required>
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="patient">Patient</option>
                    <option value="user">User</option>
                    <option value="nurse">Nurse</option>
                </select>
                @error('usertype')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create User</button>
    </form>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>
@endsection
