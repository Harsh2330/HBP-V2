<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select User and View Records</title>
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
        <h1>Select User and View Records</h1>
        <form action="{{ route('case-paper.select-user-and-records') }}" method="GET">
            <div class="form-group">
                <label for="user_id">Select User:</label>
                <select id="user_id" name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>

        @if($user)
            <h2>Medical Records for {{ $user->name }}</h2>
            <table>
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
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
                        <th>Symptoms</th>
                        <th>General Condition</th>
                        <th>Communication</th>
                        <th>Ambulation/Activity</th>
                        <th>Sleep</th>
                        <th>Urination</th>
                        <th>Appetite</th>
                        <th>Maladour</th>
                        <th>Bowl</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($casePapers as $casePaper)
                        <tr>
                            <!-- <td>{{ $casePaper->id }}</td> -->
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
                            <td class="symptoms-cell">
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
        @endif
    </div>
</body>
</html>