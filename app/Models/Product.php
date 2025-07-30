<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'sku',
        'brand_id',
        'is_active',
        'is_featured',
        'meta_title',
        'meta_description',
        'weight',
        'dimensions',
        'care_instructions',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'weight' => 'decimal:2',
    ];

    // Relationships
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collection_products')->withPivot('sort_order');
    }

    public function wishlistedBy()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function views()
    {
        return $this->hasMany(ProductView::class);
    }

    public function relatedProducts()
    {
        return $this->belongsToMany(Product::class, 'product_recommendations', 'product_id', 'recommended_product_id')
            ->withPivot('type', 'sort_order');
    }

    public function recommendedFor()
    {
        return $this->belongsToMany(Product::class, 'product_recommendations', 'recommended_product_id', 'product_id')
            ->withPivot('type', 'sort_order');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->whereHas('variants', function ($q) {
            $q->where('stock_quantity', '>', 0);
        });
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->whereHas('categories', function ($q) use ($categoryId) {
            $q->where('categories.id', $categoryId);
        });
    }

    public function scopeByBrand($query, $brandId)
    {
        return $query->where('brand_id', $brandId);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('name', 'LIKE', "%{$term}%")
                ->orWhere('description', 'LIKE', "%{$term}%")
                ->orWhere('sku', 'LIKE', "%{$term}%");
        });
    }

    // Route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Accessors
    public function getPrimaryImageAttribute()
    {
        return $this->images()->where('is_primary', true)->first()
            ?? $this->images()->first();
    }

    public function getMinPriceAttribute()
    {
        return $this->variants()->min('price');
    }

    public function getMaxPriceAttribute()
    {
        return $this->variants()->max('price');
    }

    public function getAverageRatingAttribute()
    {
        return $this->reviews()->where('is_approved', true)->avg('rating');
    }

    public function getReviewsCountAttribute()
    {
        return $this->reviews()->where('is_approved', true)->count();
    }

    public function getInStockAttribute()
    {
        return $this->variants()->where('stock_quantity', '>', 0)->exists();
    }

    public function getTotalStockAttribute()
    {
        return $this->variants()->sum('stock_quantity');
    }
}
