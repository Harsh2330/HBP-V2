<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalVisit extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'treatment', 'notes'];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
