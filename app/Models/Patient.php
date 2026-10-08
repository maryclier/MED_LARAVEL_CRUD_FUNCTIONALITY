<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'email',
        'phone',
    ];

    // A patient can have many appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}