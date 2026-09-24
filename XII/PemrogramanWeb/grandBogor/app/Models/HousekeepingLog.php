<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HousekeepingLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_id',
        'cleanliness_status',
        'inspected_at',
        'notes',
    ];

    protected $casts = [
        'inspected_at' => 'datetime',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
