<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'model', 'capacity', 'tested_capacity', 'note', 'price', 'resistance', 'discharge_current', 'sold','wrap_color','ring_color'];

    public function wrapColor() {
        return $this->belongsTo(Color::class, 'wrap_color_id');
    }

    public function ringColor() {
        return $this->belongsTo(Color::class, 'ring_color_id');
    }

    public function getRemainingCapacityAttribute() {
        return round(($this->tested_capacity/$this->capacity)*100);
    }
    public function scopeUnsold($q) {
        return $q->where('sold',0);
    }
}
