<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    protected $fillable = [
        'election_type',
        'created_user_id',
        'name',
        'ref',
        'election_date',
        'election_start_time',
        'election_end_time',
        'registration_opening_date',
        'registration_opening_time',
        'registration_closing_date',
        'registration_closing_time',
        'status',
    ];
}
