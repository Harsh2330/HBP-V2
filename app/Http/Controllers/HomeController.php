<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function adminIndex()
    {
        return view('admin.index');
    }

    public function doctorIndex()
    {
        return view('doctor.index');
    }

    public function patientIndex()
    {
        return view('patient.index');
    }

    // Update the userIndex method to return the users.dashboard view
    public function userIndex(Request $request)
    {
        return view('users.dashboard');
    }
}
