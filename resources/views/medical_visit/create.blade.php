@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Medical Visit</h1>
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
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('medical_visit.store') }}" method="POST">
                                @csrf
                                <div class="patient-details">
                                    <h3>Patient Information</h3>
                                    <div class="form-group">
                                        <label for="patient_id">Patient</label>
                                        <select name="patient_id" id="patient_id" class="form-control" @if(Auth::user()->usertype !== 'admin') disabled @endif>
                                            @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}" data-unique-id="{{ $patient->unique_id }}">{{ $patient->first_name }} {{ $patient->middle_name }} {{ $patient->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="unique_id" id="unique_id" value="">
                                </div>

                                <div class="visit-details">
                                    <h3>Visit Details</h3>
                                    <div class="form-group">
                                        <label for="visit_date">Visit Date</label>
                                        <input type="date" name="visit_date" id="visit_date" class="form-control" value="{{ old('visit_date') }}" @if(Auth::user()->usertype !== 'admin') readonly @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="doctor_id">Doctor</label>
                                        <select name="doctor_id" id="doctor_id" class="form-control" @if(Auth::user()->usertype !== 'admin') disabled @endif required>
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->middle_name }} {{ $doctor->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nurse_id">Nurse</label>
                                        <select name="nurse_id" id="nurse_id" class="form-control" @if(Auth::user()->usertype !== 'admin') disabled @endif required>
                                            @foreach($nurses as $nurse)
                                                <option value="{{ $nurse->id }}">{{ $nurse->first_name }} {{ $nurse->middle_name }} {{ $nurse->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<script>
document.getElementById('patient_id').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var uniqueId = selectedOption.getAttribute('data-unique-id');
    document.getElementById('unique_id').value = uniqueId;
});
</script>
@endsection
