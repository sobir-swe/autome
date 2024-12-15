<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'first_name',
        'last_name',
        'branch_id',
        'password',
        'email',
        'phone_number',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
