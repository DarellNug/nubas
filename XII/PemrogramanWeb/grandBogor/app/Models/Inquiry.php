<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'inquiry_code',
        'room_id',
        'name',
        'email',
        'phone',
        'inquiry_type',
        'is_vip',
        'check_in_date',
        'check_out_date',
        'guest_count',
        'special_requests',
        'message',
        'status',
        'response_time_minutes',
    ];

    protected $casts = [
        'is_vip' => 'boolean',
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'guest_count' => 'integer',
        'special_requests' => 'array',
        'response_time_minutes' => 'integer',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
