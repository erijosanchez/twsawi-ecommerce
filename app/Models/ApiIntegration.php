<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApiIntegration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'endpoint',
        'api_key',
        'secret_key',
        'config',
        'is_active',
        'last_sync',
    ];

    protected $casts = [
        'config' => 'array',
        'is_active' => 'boolean',
        'last_sync' => 'datetime',
    ];

    protected $hidden = [
        'api_key',
        'secret_key',
    ];

    // Relationships
    public function syncLogs()
    {
        return $this->hasMany(ApiSyncLog::class, 'integration_id');
    }

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
    public function updateLastSync()
    {
        $this->update(['last_sync' => now()]);
    }

    public function isConfigured()
    {
        return !empty($this->endpoint) && !empty($this->api_key);
    }
}
