<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceItem extends Model
{
    protected $fillable = [
        'title',
        'price_value',
        'unit',
        'category',
        'is_active',
        'sort_order'
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function getUnitFirstAttribute()
    {
        $parts = explode('/', $this->unit);
        return $parts[0] ?? $this->unit;
    }

    public function getUnitSecondAttribute()
    {
        $parts = explode('/', $this->unit);
        return $parts[1] ?? null;
    }
    public function getUnitThirdAttribute()
    {
        $parts = explode('/', $this->unit);
        return $parts[2] ?? null;
    }
}
