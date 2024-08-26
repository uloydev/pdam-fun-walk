<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'nik',
        'customer_code',
        'email_verified_at',
        'token',
        'additional_participant',
        'shirt_stock_id',
    ];

    protected $casts = [
        'additional_participant' => 'array',
        'email_verified_at' => 'datetime',
    ];

    protected $hidden = [
        'email_verified_at',
        'token',
    ];

    public function getParticipantNumberAttribute(): string
    {
        return str_pad($this->id ?? "", 4, '0', STR_PAD_LEFT);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_code', 'customer_code');
    }

    public function isCustomer(): bool
    {
        return $this->customer_code !== null;
    }

    public function shirtStock()
    {
        return $this->belongsTo(ShirtStock::class);
    }

    public function additionalCount(): int
    {
        return count($this->additional_participant);
    }

    public function getVerificationLink(): string
    {
        return route('participant.verify', ['token' => $this->token]);
    }
}