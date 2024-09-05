<?php

namespace App\Models;

use Carbon\Carbon;
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
        'checkin_at',
        'kit_received_at',
        'instagram',
    ];

    protected $casts = [
        'additional_participant' => 'array',
        'email_verified_at' => 'datetime',
        'checkin_at' => 'datetime',
        'kit_received_at' => 'datetime',
    ];

    protected $hidden = [
        'email_verified_at',
        'token',
    ];

    public function getParticipantNumberAttribute(): string
    {
        return str_pad($this->id ?? "", 4, '0', STR_PAD_LEFT);
    }

    // public function getCheckinAtAttribute()
    // {
    //     // format from utc to gmt+7 using Carbon
    //     return $this->attributes['checkin_at'] ? Carbon::parse($this->attributes['checkin_at'])->addHours(7) : null;
    // }

    // public function getEmailVerifiedAtAttribute()
    // {
    //     // format from utc to gmt+7 using Carbon
    //     return $this->attributes['email_verified_at'] ? Carbon::parse($this->attributes['email_verified_at'])->addHours(7) : null;
    // }

    // public function getKitReceivedAtAttribute()
    // {
    //     // format from utc to gmt+7 using Carbon
    //     return $this->attributes['kit_received_at'] ? Carbon::parse($this->attributes['kit_received_at'])->addHours(7) : null;
    // }

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