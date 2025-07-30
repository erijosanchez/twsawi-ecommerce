<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'background_color',
        'text_color',
        'is_active',
        'is_featured',
        'start_date',
        'end_date',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Relationships
    public function products()
    {
        return $this->belongsToMany(Product::class, 'collection_products')
            ->withPivot('sort_order')
            ->orderBy('collection_products.sort_order');
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

    public function scopeCurrent($query)
    {
        $now = now()->toDateString();
        return $query->where(function ($q) use ($now) {
            $q->where(function ($subQ) use ($now) {
                $subQ->whereDate('start_date', '<=', $now)
                    ->whereDate('end_date', '>=', $now);
            })->orWhere(function ($subQ) {
                $subQ->whereNull('start_date')
                    ->whereNull('end_date');
            });
        });
    }

    // Route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Accessors
    public function getIsCurrentAttribute()
    {
        if (!$this->start_date && !$this->end_date) {
            return true;
        }

        $now = now()->toDateString();
        return (!$this->start_date || $this->start_date <= $now) &&
            (!$this->end_date || $this->end_date >= $now);
    }
}
