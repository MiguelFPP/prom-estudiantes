<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'identification',
        'name',
        'surname',
    ];

    public function averages()
    {
        return $this->hasOne(Average::class);
    }
}
