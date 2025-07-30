<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SecurityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_type',
        'user_id',
        'ip_address',
        'user_agent',
        'details',
        'risk_level',
    ];

    protected $casts = [
        'details' => 'array',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopeByEventType($query, $eventType)
    {
        return $query->where('event_type', $eventType);
    }

    public function scopeByRiskLevel($query, $riskLevel)
    {
        return $query->where('risk_level', $riskLevel);
    }

    public function scopeHighRisk($query)
    {
        return $query->whereIn('risk_level', ['high', 'critical']);
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeFailedLogins($query)
    {
        return $query->where('event_type', 'failed_login');
    }

    public function scopeSuspiciousActivity($query)
    {
        return $query->where('event_type', 'suspicious_activity');
    }

    // Static methods for logging
    public static function logLogin($user, $request)
    {
        static::create([
            'event_type' => 'login',
            'user_id' => $user->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'risk_level' => 'low',
        ]);
    }

    public static function logFailedLogin($email, $request)
    {
        static::create([
            'event_type' => 'failed_login',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'details' => ['email' => $email],
            'risk_level' => 'medium',
        ]);
    }

    public static function logSuspiciousActivity($user, $activity, $request, $riskLevel = 'high')
    {
        static::create([
            'event_type' => 'suspicious_activity',
            'user_id' => $user ? $user->id : null,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'details' => ['activity' => $activity],
            'risk_level' => $riskLevel,
        ]);
    }
}
