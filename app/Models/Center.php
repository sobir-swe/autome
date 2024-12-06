<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'address',
        'phone_number',
    ];

    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CenterType::class);
    }

    public function center_social_networks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CenterSocialNetwork::class);
    }

    public function socialNetworks()
    {
        return $this->belongsToMany(SocialNetwork::class, 'center_social_networks')
            ->withPivot('username')
            ->withTimestamps();
    }
}

