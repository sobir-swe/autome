<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterSocialNetwork extends Model
{
    use HasFactory;

    protected $fillable = ['center_id', 'social_network_id', 'username'];

    public function social_network(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SocialNetwork::class, 'social_network_id');
    }

    public function center(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Center::class, 'center_id');
    }
}

