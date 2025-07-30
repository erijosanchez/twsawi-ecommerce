<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomepageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_type',
        'title',
        'subtitle',
        'content',
        'image',
        'background_color',
        'text_color',
        'button_text',
        'button_link',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('section_type', $type);
    }
}
