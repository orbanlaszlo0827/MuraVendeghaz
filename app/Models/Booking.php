<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
protected $fillable = [
        'guest_id',
        'handled_by_user_id',
        'check_in',
        'check_out',
        'adults',
        'children',
        'wants_heating',
        'wants_ac',
        'total_price',
        'status',
        'internal_notes',
    ];

    public function handler(): BelongsTo
    {
        return $this->belongsTo(User::class, 'handled_by_user_id');
    }

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }
}
