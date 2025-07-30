<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingZone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'countries',
        'states',
        'cities',
        'is_active',
    ];

    protected $casts = [
        'countries' => 'array',
        'states' => 'array',
        'cities' => 'array',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function methods()
    {
        return $this->belongsToMany(ShippingMethod::class, 'shipping_zone_methods')
            ->withPivot('price', 'free_shipping_threshold');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
