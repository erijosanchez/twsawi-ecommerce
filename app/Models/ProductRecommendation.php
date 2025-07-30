<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductRecommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'recommended_product_id',
        'type',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function recommendedProduct()
    {
        return $this->belongsTo(Product::class, 'recommended_product_id');
    }

    // Scopes
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeRelated($query)
    {
        return $query->where('type', 'related');
    }

    public function scopeUpsell($query)
    {
        return $query->where('type', 'upsell');
    }

    public function scopeCrossSell($query)
    {
        return $query->where('type', 'cross_sell');
    }
}
