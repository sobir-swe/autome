<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lid extends Model
{
    /** @use HasFactory<\Database\Factories\LidFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'lid_stage',
        'test_date',
        'lid_status_id',
        'cancel_reason_id',
    ];

    public function reason_lid(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Lid::class, 'lid_status_id');
    }

    public function reason_status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Lid::class, 'cancel_reason_id');
    }
}
