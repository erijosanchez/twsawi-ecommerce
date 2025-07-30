<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeoRedirect extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_url',
        'to_url',
        'type',
        'is_active',
        'hit_count',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'hit_count' => 'integer',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Methods
    public function incrementHitCount()
    {
        $this->increment('hit_count');
    }

    public static function findRedirect($url)
    {
        return static::active()
            ->where('from_url', $url)
            ->first();
    }
}
