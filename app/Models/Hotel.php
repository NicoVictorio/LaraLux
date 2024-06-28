<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    public function hotelType(): BelongsTo
    {
        return $this->belongsTo(HotelType::class, 'type_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'hotel_id', 'id');
    }
}
