<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id',
        'threshold_quantity',
        'is_active',
        'last_alert_sent',
    ];

    protected $casts = [
        'threshold_quantity' => 'integer',
        'is_active' => 'boolean',
        'last_alert_sent' => 'datetime',
    ];

    // Relationships
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Methods
    public function shouldTrigger()
    {
        return $this->is_active &&
            $this->productVariant->stock_quantity <= $this->threshold_quantity;
    }
}
