<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'full_name', // Ensure this line is included
        'gender',
        'date_of_birth',
        'age_category',
        'phone_number',
        'email',
        'full_address',
        'religion',
        'economic_status',
        'bpl_card_number',
        'ayushman_card',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relationship',
        'is_approved', // Ensure this line is included
    ];

    // Add an accessor for the full_name attribute
    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'id');
    }

    public function history()
    {
        return $this->hasMany(AppointmentHistory::class, 'id');
    }
}
