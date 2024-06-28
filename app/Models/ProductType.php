<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductType extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;
    protected $table = "product_types";

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'type_id', 'id');
    }
}
