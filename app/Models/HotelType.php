<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelType extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;
    protected $table = "hotel_types";

    public function hotels(): HasMany
    {
        return $this->hasMany(Hotel::class, 'type_id', 'id');
    }
}
