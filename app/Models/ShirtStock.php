<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShirtStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
        'stock',
    ];

    public function participants()
    {
        return $this->hasMany(Participant::class)->whereNotNull('email_verified_at');
    }
}
