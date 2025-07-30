<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmailCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject',
        'content',
        'status',
        'recipient_count',
        'sent_count',
        'open_count',
        'click_count',
        'scheduled_at',
        'sent_at',
    ];

    protected $casts = [
        'recipient_count' => 'integer',
        'sent_count' => 'integer',
        'open_count' => 'integer',
        'click_count' => 'integer',
        'scheduled_at' => 'datetime',
        'sent_at' => 'datetime',
    ];

    // Relationships
    public function tracking()
    {
        return $this->hasMany(EmailTracking::class, 'campaign_id');
    }

    // Scopes
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Accessors
    public function getOpenRateAttribute()
    {
        return $this->sent_count > 0 ? ($this->open_count / $this->sent_count) * 100 : 0;
    }

    public function getClickRateAttribute()
    {
        return $this->sent_count > 0 ? ($this->click_count / $this->sent_count) * 100 : 0;
    }
}
