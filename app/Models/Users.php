<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'membershipDate',
    ];

    // Format membershipDate as "12, June 2025"
    public function getMembershipDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('d/m/Y', $value)->format('d, F Y') : null;
    }

    // Format created_at as "12, June 2025"
    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d, F Y') : null;
    }

    // Format updated_at as "12, June 2025"
    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d, F Y') : null;
    }
}
