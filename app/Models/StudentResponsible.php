<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class StudentResponsible extends Model
{
    /** @use HasFactory<\Database\Factories\StudentResponsibleFactory> */
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'first_name',
        'last_name',
        'student_id',
        'email',
        'password',
        'relation_type',
        'first_number',
        'second_number',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
