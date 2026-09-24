<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_code',
        'room_id',
        'guest_name',
        'guest_email',
        'guest_phone',
        'id_type',
        'check_in_date',
        'check_out_date',
        'total_nights',
        'total_adults',
        'total_children',
        'special_requests',
        'notes',
        'total_amount',
        'payment_status',
        'reservation_status',
    ];

    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'special_requests' => 'array',
        'total_amount' => 'decimal:2',
        'total_nights' => 'integer',
        'total_adults' => 'integer',
        'total_children' => 'integer',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
