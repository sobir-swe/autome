<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonLid extends Model
{
    /** @use HasFactory<\Database\Factories\ReasonLidFactory> */
    use HasFactory;

    protected $fillable = ['reason'];
}
