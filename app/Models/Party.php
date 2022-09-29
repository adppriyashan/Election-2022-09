<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'status'];

    public static $status = [1 => 'Active', 2 => 'Inactive', 3 => 'Deleted'];
}
