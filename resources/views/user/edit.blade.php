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
        
        <div class="form__div form__div-one">
            <div class="form__icon">
                <i class='bx bx-user-circle'></i>
            </div>
            <div class="form__div-input">
                <label for="" class="form__label">First Name</label>
                <input class="form__input" type="text" name="first_name" value="{{ $user->first_name }}" required>
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
                <input class="form__input" type="text" name="middle_name" value="{{ $user->middle_name }}">
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
                <input class="form__input" type="text" name="last_name" value="{{ $user->last_name }}" required>
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
                <input class="form__input" type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" required>
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
                <input class="form__input" type="text" name="phone_number" value="{{ $user->phone_number }}" required>
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
                <input class="form__input" type="email" name="email" value="{{ $user->email }}" required>
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
                <input type="password" class="form__input" name="password">
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
                    <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="doctor" {{ $user->usertype == 'doctor' ? 'selected' : '' }}>Doctor</option>
                    <option value="patient" {{ $user->usertype == 'patient' ? 'selected' : '' }}>Patient</option>
                    <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                </select>
                @error('usertype')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success">Update User</button>
    </form>
</div>
@endsection
