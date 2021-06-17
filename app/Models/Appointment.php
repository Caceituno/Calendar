<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_doctor', 'id_patient', 'FyHinicio', 'FyHfinal',
    ];

    public function Patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }
}
