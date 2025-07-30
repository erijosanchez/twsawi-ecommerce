<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'compare_at_price',
        'cost_price',
        'stock_quantity',
        'weight',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'compare_at_price' => 'decimal:2',
        'cost_price' => 'decimal:2',
        'weight' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_variant_attributes');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    public function stockAlert()
    {
        return $this->hasOne(StockAlert::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    public function scopeLowStock($query, $threshold = 5)
    {
        return $query->where('stock_quantity', '<=', $threshold);
    }

    // Accessors
    public function getIsInStockAttribute()
    {
        return $this->stock_quantity > 0;
    }

    public function getDiscountPercentageAttribute()
    {
        if (!$this->compare_at_price || $this->compare_at_price <= $this->price) {
            return 0;
        }

        return round((($this->compare_at_price - $this->price) / $this->compare_at_price) * 100);
    }

    public function getAttributesDisplayAttribute()
    {
        return $this->attributeValues()
            ->with('attribute')
            ->get()
            ->mapWithKeys(function ($attributeValue) {
                return [$attributeValue->attribute->name => $attributeValue->value];
            });
    }
}
