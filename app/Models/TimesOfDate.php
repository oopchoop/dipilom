<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimesOfDate extends Model
{
    use HasFactory;

    protected $table = 'times_of_dates';
    protected $fillable =
        [
            'doctor_id',
            'times_id',
            'busy',
            'date'
        ];
}
