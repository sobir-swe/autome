<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'link'];

    public function centers()
    {
        return $this->belongsToMany(Center::class, 'center_social_networks')
            ->withPivot('username')  // Pivot jadvalidagi qo'shimcha maydon
            ->withTimestamps();     // Timestamps qo'shish (agar kerak bo'lsa)
    }
}
