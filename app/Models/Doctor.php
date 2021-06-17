<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'document',
        'phone',
        'sex',
        'id_clinic',
        'rol',
    ];

    public function CON()
    {
        return $this->belongsTo(Consultant::class, 'id_clinic');
    }
}
