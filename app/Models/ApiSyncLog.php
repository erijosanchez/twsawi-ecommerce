<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApiSyncLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'integration_id',
        'action',
        'status',
        'records_processed',
        'error_message',
        'execution_time',
    ];

    protected $casts = [
        'records_processed' => 'integer',
        'execution_time' => 'integer',
    ];

    // Relationships
    public function integration()
    {
        return $this->belongsTo(ApiIntegration::class, 'integration_id');
    }

    // Scopes
    public function scopeSuccess($query)
    {
        return $query->where('status', 'success');
    }

    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    public function scopeByIntegration($query, $integrationId)
    {
        return $query->where('integration_id', $integrationId);
    }

    public function scopeByAction($query, $action)
    {
        return $query->where('action', $action);
    }

    // Accessors
    public function getExecutionTimeFormattedAttribute()
    {
        if (!$this->execution_time) return null;
        
        $ms = $this->execution_time;
        
        if ($ms < 1000) {
            return $ms . 'ms';
        } elseif ($ms < 60000) {
            return round($ms / 1000, 2) . 's';
        } else {
            return round($ms / 60000, 2) . 'min';
        }
    }
}
