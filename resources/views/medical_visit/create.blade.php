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
                                        <select name="patient_id" id="patient_id" class="form-control">
                                            @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}" data-unique-id="{{ $patient->unique_id }}">{{ $patient->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="unique_id" id="unique_id" value="">
                                </div>

                                <div class="visit-details">
                                    <h3>Visit Details</h3>
                                    <div class="form-group">
                                        <label for="visit_date">Visit Date</label>
                                        <input type="date" name="visit_date" id="visit_date" class="form-control" value="{{ old('visit_date') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="doctor_name">Doctor</label>
                                        <input type="text" name="doctor_name" id="doctor_name" class="form-control" value="{{ old('doctor_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nurse_name">Nurse</label>
                                        <input type="text" name="nurse_name" id="nurse_name" class="form-control" value="{{ old('nurse_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="diagnosis">Diagnosis</label>
                                        <textarea name="diagnosis" id="diagnosis" class="form-control" rows="3">{{ old('diagnosis') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="simplified_diagnosis">Simplified Diagnosis</label>
                                        <textarea name="simplified_diagnosis" id="simplified_diagnosis" class="form-control" rows="3">{{ old('simplified_diagnosis') }}</textarea>
                                    </div>
                                </div>

                                <div class="treatment-details">
                                    <h3>Treatment Information</h3>
                                    <div class="form-group">
                                        <label for="blood_pressure">Blood Pressure</label>
                                        <input type="text" name="blood_pressure" id="blood_pressure" class="form-control" value="{{ old('blood_pressure') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="heart_rate">Heart Rate</label>
                                        <input type="text" name="heart_rate" id="heart_rate" class="form-control" value="{{ old('heart_rate') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="temperature">Temperature</label>
                                        <input type="text" name="temperature" id="temperature" class="form-control" value="{{ old('temperature') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">Weight</label>
                                        <input type="text" name="weight" id="weight" class="form-control" value="{{ old('weight') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="ongoing_treatments">Ongoing Treatments</label>
                                        <textarea name="ongoing_treatments" id="ongoing_treatments" class="form-control" rows="3">{{ old('ongoing_treatments') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="medications_prescribed">Medications Prescribed</label>
                                        <textarea name="medications_prescribed" id="medications_prescribed" class="form-control" rows="3">{{ old('medications_prescribed') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="procedures">Procedures Performed</label>
                                        <textarea name="procedures" id="procedures" class="form-control" rows="3">{{ old('procedures') }}</textarea>
                                    </div>
                                </div>

                                <div class="notes">
                                    <h3>Additional Notes</h3>
                                    <div class="form-group">
                                        <label for="doctor_notes">Doctor's Notes</label>
                                        <textarea name="doctor_notes" id="doctor_notes" class="form-control" rows="3">{{ old('doctor_notes') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="nurse_observations">Nurse's Observations</label>
                                        <textarea name="nurse_observations" id="nurse_observations" class="form-control" rows="3">{{ old('nurse_observations') }}</textarea>
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
