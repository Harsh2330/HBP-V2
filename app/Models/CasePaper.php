<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasePaper extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'patient_id',
        'contact',
        // 'name',
        'age',
        'sex',
        'address',
        'education',
        'marital_status',
        'visit_type',
        'diagnosis',
        'chief_complaint',
        'symptom_pain',
        'symptom_sore_mouth',
        'symptom_itching',
        'constipation',
        'symptom_nausea',
        'symptom_swelling',
        'symptom_breathlessness',
        'heat_burn',
        'lymphedema',
        'cough',
        'symptom_vomiting',
        'symptom_delirum',
        'symptom_tiredness',
        'bleeding',
        'pressure_sores',
        'swallowing_difficulty',
        'ulcer_wound',
        'drowsiness',
        'others',
        'general_condition',
        'communication',
        'ambulation_activity',
        'sleep',
        'urination',
        'appetite',
        'maladour',
        'bowl',
    ];
}

?>