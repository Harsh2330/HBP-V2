<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name', // Add first_name to fillable attributes
        'middle_name', // Add middle_name to fillable attributes
        'last_name', // Add last_name to fillable attributes
        'date_of_birth', // Add date_of_birth to fillable attributes
        'phone_number', // Add phone_number to fillable attributes
        'name',
        'email',
        'password',
        'unique_id',
        'usertype',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function approveAsPatient(array $patientDetails)
    {
        $this->usertype = 'patient';
        $this->unique_id = uniqid('patient_');
        $this->save();

        return Patient::create(array_merge($patientDetails, ['user_id' => $this->id]));
    }

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
}
