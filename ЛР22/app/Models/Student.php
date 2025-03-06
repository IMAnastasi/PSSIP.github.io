<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasTimestamps;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'sex',
        'birthday',
        'speciality'
    ];
}
