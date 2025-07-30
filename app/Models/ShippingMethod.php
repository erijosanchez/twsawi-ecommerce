<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'free_shipping_threshold',
        'estimated_days_min',
        'estimated_days_max',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'free_shipping_threshold' => 'decimal:2',
        'estimated_days_min' => 'integer',
        'estimated_days_max' => 'integer',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    // Relationships
    public function zones()
    {
        return $this->belongsToMany(ShippingZone::class, 'shipping_zone_methods')
            ->withPivot('price', 'free_shipping_threshold');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    // Accessors
    public function getEstimatedDeliveryAttribute()
    {
        if ($this->estimated_days_min && $this->estimated_days_max) {
            return $this->estimated_days_min . '-' . $this->estimated_days_max . ' días';
        }
        return null;
    }
}
