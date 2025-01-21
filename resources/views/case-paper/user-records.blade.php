<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Records for {{ $user->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/patstyle.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .back-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Medical Records for {{ $user->name }}</h1>
        <a href="{{ url()->previous() }}" class="back-button">Back</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Contact</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Address</th>
                    <th>Education</th>
                    <th>Marital Status</th>
                    <th>Visit Type</th>
                    <th>Diagnosis</th>
                    <th>Chief Complaint</th>
                    <!-- Add other fields as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($casePapers as $casePaper)
                    <tr>
                        <td>{{ $casePaper->id }}</td>
                        <td>{{ $casePaper->date }}</td>
                        <td>{{ $casePaper->contact }}</td>
                        <td>{{ $casePaper->age }}</td>
                        <td>{{ $casePaper->sex }}</td>
                        <td>{{ $casePaper->address }}</td>
                        <td>{{ $casePaper->education }}</td>
                        <td>{{ $casePaper->marital_status }}</td>
                        <td>{{ $casePaper->visit_type }}</td>
                        <td>{{ $casePaper->diagnosis }}</td>
                        <td>{{ $casePaper->chief_complaint }}</td>
                        <!-- Add other fields as needed -->

                        <td>
                            Pain: {{ $casePaper->symptom_pain ? 'Yes' : 'No' }},
                            Sore Mouth: {{ $casePaper->symptom_sore_mouth ? 'Yes' : 'No' }},
                            Itching: {{ $casePaper->symptom_itching ? 'Yes' : 'No' }},
                            Constipation: {{ $casePaper->constipation ? 'Yes' : 'No' }},
                            Nausea: {{ $casePaper->symptom_nausea ? 'Yes' : 'No' }},
                            Swelling: {{ $casePaper->symptom_swelling ? 'Yes' : 'No' }},
                            Breathlessness: {{ $casePaper->symptom_breathlessness ? 'Yes' : 'No' }},
                            Heat Burn: {{ $casePaper->heat_burn ? 'Yes' : 'No' }},
                            Lymphedema: {{ $casePaper->lymphedema ? 'Yes' : 'No' }},
                            Cough: {{ $casePaper->cough ? 'Yes' : 'No' }},
                            Vomiting: {{ $casePaper->symptom_vomiting ? 'Yes' : 'No' }},
                            Delirum: {{ $casePaper->symptom_delirum ? 'Yes' : 'No' }},
                            Tiredness: {{ $casePaper->symptom_tiredness ? 'Yes' : 'No' }},
                            Bleeding: {{ $casePaper->bleeding ? 'Yes' : 'No' }},
                            Pressure Sores: {{ $casePaper->pressure_sores ? 'Yes' : 'No' }},
                            Swallowing Difficulty: {{ $casePaper->swallowing_difficulty ? 'Yes' : 'No' }},
                            Ulcer/Wound: {{ $casePaper->ulcer_wound ? 'Yes' : 'No' }},
                            Drowsiness: {{ $casePaper->drowsiness ? 'Yes' : 'No' }},
                            Others: {{ $casePaper->others ? 'Yes' : 'No' }}
                        </td>
                        <td>{{ $casePaper->general_condition }}</td>
                        <td>{{ $casePaper->communication }}</td>
                        <td>{{ $casePaper->ambulation_activity }}</td>
                        <td>{{ $casePaper->sleep }}</td>
                        <td>{{ $casePaper->urination }}</td>
                        <td>{{ $casePaper->appetite }}</td>
                        <td>{{ $casePaper->maladour }}</td>
                        <td>{{ $casePaper->bowl }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>