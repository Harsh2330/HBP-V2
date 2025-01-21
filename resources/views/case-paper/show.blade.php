<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Paper Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/patstyle.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Case Paper Details</h1>
        <div class="form-group">
            <label>Date:</label>
            <p class="form-control">{{ $casePaper->date }}</p>
        </div>
        <div class="form-group">
            <label>UID:</label>
            <p class="form-control">{{ $casePaper->uid }}</p>
        </div>
        <div class="form-group">
            <label>Contact No:</label>
            <p class="form-control">{{ $casePaper->contact }}</p>
        </div>
        <div class="form-group">
            <label>Name of the Patient:</label>
            <p class="form-control">{{ $casePaper->name }}</p>
        </div>
        <div class="form-group">
            <label>Age:</label>
            <p class="form-control">{{ $casePaper->age }}</p>
        </div>
        <div class="form-group">
            <label>Sex:</label>
            <p class="form-control">{{ $casePaper->sex }}</p>
        </div>
        <div class="form-group">
            <label>Address:</label>
            <p class="form-control">{{ $casePaper->address }}</p>
        </div>
        <div class="form-group">
            <label>Education Status:</label>
            <p class="form-control">{{ $casePaper->education }}</p>
        </div>
        <div class="form-group">
            <label>Marital Status:</label>
            <p class="form-control">{{ $casePaper->marital_status }}</p>
        </div>
        <div class="form-group">
            <label>Type of Visit:</label>
            <p class="form-control">{{ $casePaper->visit_type }}</p>
        </div>
        <div class="form-group">
            <label>Diagnosis:</label>
            <p class="form-control">{{ $casePaper->diagnosis }}</p>
        </div>
        <div class="form-group">
            <label>Chief Complaint:</label>
            <p class="form-control">{{ $casePaper->chief_complaint }}</p>
        </div>
        <div class="form-group">
            <label>Present Symptoms:</label>
            <ul class="list-group">
                <li class="list-group-item">Pain: {{ $casePaper->symptom_pain ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Sore Mouth: {{ $casePaper->symptom_sore_mouth ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Itching: {{ $casePaper->symptom_itching ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Constipation: {{ $casePaper->constipation ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Nausea: {{ $casePaper->symptom_nausea ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Swelling: {{ $casePaper->symptom_swelling ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Breathlessness: {{ $casePaper->symptom_breathlessness ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Heat Burn: {{ $casePaper->heat_burn ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Lymphedema: {{ $casePaper->lymphedema ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Cough: {{ $casePaper->cough ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Vomiting: {{ $casePaper->symptom_vomiting ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Delirum: {{ $casePaper->symptom_delirum ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Tiredness: {{ $casePaper->symptom_tiredness ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Bleeding: {{ $casePaper->bleeding ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Pressure Sores: {{ $casePaper->pressure_sores ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Swallowing Difficulty: {{ $casePaper->swallowing_difficulty ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Ulcer/Wound: {{ $casePaper->ulcer_wound ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Drowsiness: {{ $casePaper->drowsiness ? 'Yes' : 'No' }}</li>
                <li class="list-group-item">Others: {{ $casePaper->others ? 'Yes' : 'No' }}</li>
            </ul>
        </div>
        <div class="form-group">
            <label>General Condition:</label>
            <p class="form-control">{{ $casePaper->general_condition }}</p>
        </div>
        <div class="form-group">
            <label>Communication:</label>
            <p class="form-control">{{ $casePaper->communication }}</p>
        </div>
        <div class="form-group">
            <label>Ambulation/Activity:</label>
            <p class="form-control">{{ $casePaper->ambulation_activity }}</p>
        </div>
        <div class="form-group">
            <label>Sleep:</label>
            <p class="form-control">{{ $casePaper->sleep }}</p>
        </div>
        <div class="form-group">
            <label>Urination:</label>
            <p class="form-control">{{ $casePaper->urination }}</p>
        </div>
        <div class="form-group">
            <label>Appetite:</label>
            <p class="form-control">{{ $casePaper->appetite }}</p>
        </div>
        <div class="form-group">
            <label>Maladour:</label>
            <p class="form-control">{{ $casePaper->maladour }}</p>
        </div>
        <div class="form-group">
            <label>Bowl:</label>
            <p class="form-control">{{ $casePaper->bowl }}</p>
        </div>
        <a href="{{ route('case-paper.create') }}" class="btn btn-primary">Back to Form</a>
    </div>
</body>
</html>