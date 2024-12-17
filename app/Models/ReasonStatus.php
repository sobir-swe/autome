<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonStatus extends Model
{
    /** @use HasFactory<\Database\Factories\ReasonStatusFactory> */
    use HasFactory;

    protected $fillable = ['status'];
}
