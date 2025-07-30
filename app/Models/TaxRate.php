<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rate',
        'country',
        'state',
        'city',
        'postal_code',
        'is_active',
    ];

    protected $casts = [
        'rate' => 'decimal:4',
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeForLocation($query, $country, $state = null, $city = null, $postalCode = null)
    {
        $query->where('country', $country);
        
        if ($state) {
            $query->where(function ($q) use ($state) {
                $q->whereNull('state')->orWhere('state', $state);
            });
        }
        
        if ($city) {
            $query->where(function ($q) use ($city) {
                $q->whereNull('city')->orWhere('city', $city);
            });
        }
        
        if ($postalCode) {
            $query->where(function ($q) use ($postalCode) {
                $q->whereNull('postal_code')->orWhere('postal_code', $postalCode);
            });
        }
        
        return $query;
    }
}
