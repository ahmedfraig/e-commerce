<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code', 'type', 'value', 'active', 'max_uses', 'uses', 'min_order', 'starts_at', 'ends_at'
    ];

    public function isValid(float $orderTotal): bool
    {
        if (!$this->active) return false;

        $now = Carbon::now();
        if ($this->starts_at && $now->lt($this->starts_at)) return false;
        if ($this->ends_at && $now->gt($this->ends_at)) return false;

        if (!is_null($this->max_uses) && $this->uses >= $this->max_uses) return false;
        if (!is_null($this->min_order) && $orderTotal < (float)$this->min_order) return false;

        return true;
    }   
    
    public function discountFor(float $orderTotal): float
    {
        if ($this->type == 'percent') {
            return round($orderTotal * ((float)$this->value / 100), 2);
        }
        return min($orderTotal, (float)$this->value);
    }
}
