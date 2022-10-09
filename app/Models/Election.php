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
        'election_date',
        'election_start_time',
        'election_end_time',
        'registration_opening_date',
        'registration_opening_time',
        'registration_closing_date',
        'registration_closing_time',
        'status',
    ];

    public static $status = [1 => 'Active', 2 => 'Inactive', 3 => 'Blocked', 4 => 'Deleted'];


    public static function laratablesStatus($election)
    {
        return '<span class="badge badge-' . (new Colors)->getColor($election['status']) . '">' . self::$status[$election['status']] . '</span>';
    }

    public static function laratablesSearchableColumns()
    {
        return ['nic', 'name'];
    }

    public static function laratablesQueryConditions($query)
    {
        return $query->whereIn('status', [1, 2]);
    }

    public static function laratablesCustomAction($election)
    {
        return '<i onclick="doEdit(' . $election['id'] . ')" class="la la-edit ml1 text-warning"></i><i onclick="doDelete(' . $election['id'] . ')" class="la la-trash ml-1 text-danger"></i>';
    }
}
