<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_category_id',
        'name',
        'code',
        'location',
        'capacity_adults',
        'capacity_children',
        'price_per_night',
        'price_note',
        'area_sqm',
        'facilities',
        'status',
        'thumbnail',
        'description',
        'is_active',
    ];

    protected $casts = [
        'facilities' => 'array',
        'is_active' => 'boolean',
        'price_per_night' => 'decimal:2',
        'capacity_adults' => 'integer',
        'capacity_children' => 'integer',
        'area_sqm' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(RoomCategory::class, 'room_category_id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    public function housekeepingLogs(): HasMany
    {
        return $this->hasMany(HousekeepingLog::class);
    }

    public function latestHousekeepingLog(): HasOne
    {
        return $this->hasOne(HousekeepingLog::class)->latestOfMany();
    }
}
