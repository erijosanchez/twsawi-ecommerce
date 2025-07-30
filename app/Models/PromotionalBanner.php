<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromotionalBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'background_color',
        'text_color',
        'button_text',
        'button_url',
        'position',
        'is_active',
        'start_date',
        'end_date',
        'click_count',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'click_count' => 'integer',
        'sort_order' => 'integer',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByPosition($query, $position)
    {
        return $query->where('position', $position);
    }

    public function scopeCurrent($query)
    {
        $now = now();
        return $query->where('is_active', true)
            ->where(function ($q) use ($now) {
                $q->where(function ($subQ) use ($now) {
                    $subQ->where('start_date', '<=', $now)
                        ->where('end_date', '>=', $now);
                })->orWhere(function ($subQ) {
                    $subQ->whereNull('start_date')
                        ->whereNull('end_date');
                });
            });
    }

    // Methods
    public function incrementClickCount()
    {
        $this->increment('click_count');
    }

    // Accessors
    public function getIsCurrentAttribute()
    {
        if (!$this->is_active) return false;

        if (!$this->start_date && !$this->end_date) return true;

        $now = now();
        return (!$this->start_date || $this->start_date <= $now) &&
            (!$this->end_date || $this->end_date >= $now);
    }
}
