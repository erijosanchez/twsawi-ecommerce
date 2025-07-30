<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key_name',
        'value',
        'type',
        'group_name',
        'description',
        'is_editable',
    ];

    protected $casts = [
        'is_editable' => 'boolean',
    ];

    // Scopes
    public function scopeByGroup($query, $group)
    {
        return $query->where('group_name', $group);
    }

    public function scopeEditable($query)
    {
        return $query->where('is_editable', true);
    }

    // Helper methods
    public static function get($key, $default = null)
    {
        $setting = static::where('key_name', $key)->first();
        return $setting ? $setting->getCastedValue() : $default;
    }

    public function getCastedValue()
    {
        switch ($this->type) {
            case 'boolean':
                return (bool) $this->value;
            case 'number':
                return is_numeric($this->value) ? (float) $this->value : 0;
            case 'json':
                return json_decode($this->value, true);
            default:
                return $this->value;
        }
    }
}
