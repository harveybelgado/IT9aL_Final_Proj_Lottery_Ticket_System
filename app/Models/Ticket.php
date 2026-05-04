<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'draw_id',
        'numbers',
        'is_winner',
        'is_claimed',
    ];

    protected $casts = [
        'is_winner' => 'boolean',
        'is_claimed' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function draw()
    {
        return $this->belongsTo(Draw::class);
    }
}
