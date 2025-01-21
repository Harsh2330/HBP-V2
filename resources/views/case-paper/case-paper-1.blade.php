<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Paper Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/patstyle.css') }}">
</head>
<body>
    <div class="form-container" style="max-width: 600px;"> <!-- Added inline style to reduce size -->
        <h1>Case Paper</h1>
        <form action="{{ route('case-paper.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="contact">Contact No:</label>
                <input type="text" id="contact" name="contact">
            </div>
            <div class="form-group">
                <label for="user_id">Name of the Patient:</label>
                <select id="user_id" name="user_id">
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age">
            </div>
            <div class="form-group">
                <label for="sex">Sex:</label>
                <select id="sex" name="sex">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="education">Education Status:</label>
                <input type="text" id="education" name="education">
            </div>
            <div class="form-group">
                <label for="marital_status">Marital Status:</label>
                <input type="text" id="marital_status" name="marital_status">
            </div>
            <div class="form-group">
                <label for="visit_type">Type of Visit:</label>
                <select id="visit_type" name="visit_type">
                    <option value="routine">Routine</option>
                    <option value="emergency">Emergency</option>
                </select>
            </div>
            <div class="form-group">
                <label for="diagnosis">Diagnosis:</label>
                <input type="text" id="diagnosis" name="diagnosis">
            </div>
            <div class="form-group">
                <label for="chief_complaint">Chief Complaint:</label>
                <textarea id="chief_complaint" name="chief_complaint" rows="3"></textarea>
            </div>
            <h2>Present Symptoms:</h2>
            <table class="symptoms-table">
                <tr>
                    <td><input type="checkbox" name="symptom_pain"></td>
                    <td><label>Pain</label></td>
                    <td><input type="checkbox" name="symptom_sore_mouth"></td>
                    <td><label>Sore Mouth</label></td>
                    <td><input type="checkbox" name="symptom_itching"></td>
                    <td><label>Itching</label></td>
                    <td><input type="checkbox" name="constipation"></td>
                    <td><label>Constipation</label></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="symptom_nausea"></td>
                    <td><label>Nausea</label></td>
                    <td><input type="checkbox" name="symptom_swelling"></td>
                    <td><label>Swelling</label></td>
                    <td><input type="checkbox" name="symptom_breathlessness"></td>
                    <td><label>Breathlessness</label></td>
                    <td><input type="checkbox" name="heat_burn"></td>
                    <td><label>Heat Burn</label></td>
                    <td><input type="checkbox" name="lymphedema"></td>
                    <td><label>Cough</label></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="symptom_vomiting"></td>
                    <td><label>Vomiting</label></td>
                    <td><input type="checkbox" name="symptom_delirum"></td>
                    <td><label>Delirum</label></td>
                    <td><input type="checkbox" name="symptom_tiredness"></td>
                    <td><label>Tiredness</label></td>
                    <td><input type="checkbox" name="bleeding"></td>
                    <td><label>Bleeding</label></td>
                    <td><input type="checkbox" name="pressure_sores"></td>
                    <td><label>Pressure sores</label></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="swallowing_difficulty"></td>
                    <td><label>Swallowing Difficulty</label></td>
                    <td><input type="checkbox" name="ulcer_wound"></td>
                    <td><label>Ulcer/wound</label></td>
                    <td><input type="checkbox" name="drowsiness"></td>
                    <td><label>Drowsiness</label></td>
                    <td><input type="checkbox" name="cough"></td>
                    <td><label>Cough</label></td>
                    <td><input type="checkbox" name="others"></td>
                    <td><label>Others</label></td>
                </tr>
                <!-- Add more symptom rows as needed -->
            </table>
            <h2>General Condition</h2>
            <div class="form-group">
                <label for="general_condition">General Condition:</label>
                <select id="general_condition" name="general_condition">
                    <option value="fairly_good">Fairly Good</option>
                    <option value="poor">Poor</option>
                    <option value="debilitated">Debilitated</option>
                    <option value="very_weak">Very Weak</option>
                    <option value="drowsy">Drowsy</option>
                    <option value="unconscious">Unconscious</option>
                    <option value="terminal_state">Terminal State</option>
                </select>
            </div>
            <div class="form-group">
                <label for="communication">Communication:</label>
                <select id="communication" name="communication">
                    <option value="easy">Easy</option>
                    <option value="occasionally">Occasionally</option>
                    <option value="withdrawn">Withdrawn</option>
                    <option value="non_communicative">Non-communicative</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ambulation_activity">Ambulation/Activity:</label>
                <select id="ambulation_activity" name="ambulation_activity">
                    <option value="bed_bound">Bed bound</option>
                    <option value="normal_activities">Normal activities (need support)</option>
                    <option value="limited_activities">Limited activities (need support)</option>
                    <option value="assistence_for_adl">Assistence for ADL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sleep">Sleep:</label>
                <select id="sleep" name="sleep">
                    <option value="normal">Normal</option>
                    <option value="disturbed">Disturbed</option>
                    <option value="wakeful_nights">Wakeful nights</option>
                </select>
            </div>
            <div class="form-group">
                <label for="urination">Urination:</label>
                <select id="urination" name="urination">
                    <option value="normal">Normal</option>
                    <option value="incontinence">Incontinence</option>
                    <option value="increased_frequency">Increased frequency</option>
                    <option value="hesitancy">Hesitancy</option>
                    <option value="on_catheter">On Catheter</option>
                </select>
            </div>
            <div class="form-group">
                <label for="appetite">Appetite:</label>
                <select id="appetite" name="appetite">
                    <option value="good">Good</option>
                    <option value="fair">Fair</option>
                    <option value="poor">Poor</option>
                    <option value="none">None</option>
                </select>
            </div>
            <div class="form-group">
                <label for="maladour">Maladour:</label>
                <select id="maladour" name="maladour">
                    <option value="infected_ulcer">Infected ulcer</option>
                    <option value="due_to_incontinence">Due to incontinence</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bowl">Bowl:</label>
                <select id="bowl" name="bowl">
                    <option value="normal">Normal</option>
                    <option value="diarrhoea">Diarrhoea</option>
                    <option value="constipation">Constipation</option>
                    <option value="stoma">Stoma</option>
                </select>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Add other fields as needed -->
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
            <a href="./patientreg2.html">Next page</a>
        </form>
    </div>
</body>
</html>