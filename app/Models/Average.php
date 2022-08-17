<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Average extends Model
{
    use HasFactory;

    protected $fillable = [
        'partial1',
        'partial2',
        'partial3',
        'final',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
