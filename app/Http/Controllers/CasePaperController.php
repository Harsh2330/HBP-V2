<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CasePaper;
use App\Models\User;

class CasePaperController extends Controller
{
    /**
     * Show the form for creating a new case paper.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $patients = User::all(); // Fetch all users
        return view('case-paper.case-paper-1', compact('patients'));
    }

    /**
     * Store a newly created case paper in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    // Set default values for checkbox fields
    $request->merge([
        'symptom_pain' => $request->has('symptom_pain'),
        'symptom_sore_mouth' => $request->has('symptom_sore_mouth'),
        'symptom_itching' => $request->has('symptom_itching'),
        'constipation' => $request->has('constipation'),
        'symptom_nausea' => $request->has('symptom_nausea'),
        'symptom_swelling' => $request->has('symptom_swelling'),
        'symptom_breathlessness' => $request->has('symptom_breathlessness'),
        'heat_burn' => $request->has('heat_burn'),
        'lymphedema' => $request->has('lymphedema'),
        'cough' => $request->has('cough'),
        'symptom_vomiting' => $request->has('symptom_vomiting'),
        'symptom_delirum' => $request->has('symptom_delirum'),
        'symptom_tiredness' => $request->has('symptom_tiredness'),
        'bleeding' => $request->has('bleeding'),
        'pressure_sores' => $request->has('pressure_sores'),
        'swallowing_difficulty' => $request->has('swallowing_difficulty'),
        'ulcer_wound' => $request->has('ulcer_wound'),
        'drowsiness' => $request->has('drowsiness'),
        'others' => $request->has('others'),
    ]);

    // Validate the request data
    $validatedData = $request->validate([
        'date' => 'required|date',
        'user_id' => 'required|exists:users,id', // Validate user_id
        'contact' => 'required|string|max:255',
        'age' => 'required|integer',
        'sex' => 'required|string',
        'address' => 'required|string',
        'education' => 'required|string',
        'marital_status' => 'required|string',
        'visit_type' => 'required|string',
        'diagnosis' => 'required|string',
        'chief_complaint' => 'required|string',
        'symptom_pain' => 'boolean',
        'symptom_sore_mouth' => 'boolean',
        'symptom_itching' => 'boolean',
        'constipation' => 'boolean',
        'symptom_nausea' => 'boolean',
        'symptom_swelling' => 'boolean',
        'symptom_breathlessness' => 'boolean',
        'heat_burn' => 'boolean',
        'lymphedema' => 'boolean',
        'cough' => 'boolean',
        'symptom_vomiting' => 'boolean',
        'symptom_delirum' => 'boolean',
        'symptom_tiredness' => 'boolean',
        'bleeding' => 'boolean',
        'pressure_sores' => 'boolean',
        'swallowing_difficulty' => 'boolean',
        'ulcer_wound' => 'boolean',
        'drowsiness' => 'boolean',
        'others' => 'boolean',
        'general_condition' => 'required|string',
        'communication' => 'required|string',
        'ambulation_activity' => 'required|string',
        'sleep' => 'required|string',
        'urination' => 'required|string',
        'appetite' => 'required|string',
        'maladour' => 'required|string',
        'bowl' => 'required|string',
    ]);

    // Set the patient_id using the user_id from the form
    $validatedData['patient_id'] = $validatedData['user_id'];
    unset($validatedData['user_id']); // Remove user_id from the validated data

    // Create a new CasePaper instance and save the data
    $casePaper = CasePaper::create($validatedData);

    return redirect()->route('case-paper.show', $casePaper->id)->with('success', 'Case paper created successfully.');
}

    /**
     * Show the case paper view.
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $casePaper = CasePaper::findOrFail($id);
        return view('case-paper.show', compact('casePaper'));
    }

    public function selectUser()
    {
        $users = User::all(); // Fetch all users
        return view('case-paper.select-user', compact('users'));
    }

    public function userRecords(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $casePapers = CasePaper::where('patient_id', $user->id)->get(); // Fetch case papers for the selected user
        return view('case-paper.user-records', compact('user', 'casePapers'));
    }

    public function selectUserAndRecords(Request $request)
{
    $users = User::all(); // Fetch all users
    $casePapers = collect(); // Initialize an empty collection

    if ($request->has('user_id')) {
        $user = User::findOrFail($request->user_id);
        $casePapers = CasePaper::where('patient_id', $user->id)->get(); // Fetch case papers for the selected user
    } else {
        $user = null;
    }

    return view('case-paper.select-user-and-records', compact('users', 'user', 'casePapers'));
}
}

?>