<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'appointment_date',
        'appointment_time',
        'status',
        'notes',
    ];

    // Appointment belongs to a doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // Appointment belongs to a patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}