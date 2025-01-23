@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Patients</h1>
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
                            <h3 class="card-title">Search Patients</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.patient.index') }}" method="GET">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search by patient name">
                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Patients List</h3>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('admin.patient.create') }}" class="btn btn-primary mb-3">Add Patient</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patients as $patient)
                                        <tr>
                                            <td>{{ $patient->name }}</td>
                                            <td>{{ $patient->email }}</td>
                                            <td>
                                                <a href="{{ route('admin.patient.show', $patient->id) }}" class="btn btn-info">View</a>
                                                @if(!$patient->is_approved)
                                                    <form action="{{ route('admin.patient.approve', $patient->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Approve</button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('admin.patient.destroy', $patient->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $patients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection