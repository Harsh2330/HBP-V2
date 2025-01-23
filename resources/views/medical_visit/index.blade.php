@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Medical Visits</h1>
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
                            <h3 class="card-title">Medical Visits List</h3>
                        </div>
                        <div class="card-body">
                            @if($medicalVisits)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Patient Unique ID</th>
                                        <th>Patient Name</th>
                                        <th>Visit Date</th>
                                        <th>Doctor</th>
                                        <th>Nurse</th>
                                        <th>Diagnosis</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($medicalVisits as $visit)
                                        <tr>
                                            <td>{{ $visit->patient->unique_id }}</td>
                                            <td>{{ $visit->patient->name }}</td>
                                            <td>{{ $visit->visit_date }}</td>
                                            <td>{{ $visit->doctor_name }}</td>
                                            <td>{{ $visit->nurse_name }}</td>
                                            <td>{{ $visit->simplified_diagnosis }}</td>
                                            <td>
                                                <a href="{{ route('medical_visit.show', $visit->id) }}" class="btn btn-info">View Visit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $medicalVisits->links() }}
                            @else
                            <p>No medical visits available.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
