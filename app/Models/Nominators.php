<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominators extends Model
{
    use HasFactory;

    protected $fillable = [
        'party_id',
        'name',
        'nic',
        'dob',
        'address',
        'province_id',
        'status',
    ];
}
