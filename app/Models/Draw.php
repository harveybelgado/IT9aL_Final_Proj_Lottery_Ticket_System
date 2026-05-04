<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Draw extends Model
{
    protected $fillable = [
        'draw_date',
        'winning_numbers',
        'is_completed',
    ];

    protected $casts = [
        'draw_date' => 'date',
        'is_completed' => 'boolean',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
