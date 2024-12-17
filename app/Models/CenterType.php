<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function centers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Center::class);
    }
}
