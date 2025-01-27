<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'unique_id',
        'visit_date',
        'doctor_name',
        'nurse_name',
        'diagnosis',
        'simplified_diagnosis',
        'blood_pressure',
        'heart_rate',
        'temperature',
        'weight',
        'ongoing_treatments',
        'medications_prescribed',
        'procedures',
        'doctor_notes',
        'nurse_observations'
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    // Removed unnecessary relationships
}
