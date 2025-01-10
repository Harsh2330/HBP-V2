<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
