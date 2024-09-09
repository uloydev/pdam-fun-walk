<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'is_prime',
        'is_locked',
    ];

    protected $casts = [
        'is_prime' => 'boolean',
        'is_locked' => 'boolean',
    ];

    public function winners()
    {
        return $this->hasMany(PrizeWinner::class);
    }
}
