<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'url',
        'title',
        'viewed_at',
        'time_on_page',
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
        'time_on_page' => 'integer',
    ];

    // Relationships
    public function visit()
    {
        return $this->belongsTo(SiteVisit::class, 'visit_id');
    }
}
