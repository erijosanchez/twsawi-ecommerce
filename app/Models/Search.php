<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Search extends Model
{
    use HasFactory;

    protected $fillable = [
        'query',
        'results_count',
        'user_id',
        'session_id',
        'searched_at',
    ];

    protected $casts = [
        'results_count' => 'integer',
        'searched_at' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopePopular($query, $limit = 10)
    {
        return $query->selectRaw('query, COUNT(*) as search_count')
            ->groupBy('query')
            ->orderByDesc('search_count')
            ->limit($limit);
    }
}
