<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voters extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'province_id',
        'finger_print_id',
        'name',
        'nic',
        'address',
        'status',
    ];

    public static $status = [1 => 'Active', 2 => 'Inactive', 3 => 'Blocked', 4 => 'Deleted'];

    public static function laratablesStatus($voter)
    {
        return '<span class="badge badge-' . (new Colors)->getColor($voter['status']) . '">' . self::$status[$voter['status']] . '</span>';
    }

    public static function laratablesSearchableColumns()
    {
        return ['nic', 'name'];
    }

    public static function laratablesQueryConditions($query)
    {
        return $query->whereIn('status', [1, 2]);
    }

    public static function laratablesCustomAction($voter)
    {
        return '<i onclick="doEdit(' . $voter['id'] . ')" class="la la-edit ml1 text-warning"></i><i onclick="doDelete(' . $voter['id'] . ')" class="la la-trash ml-1 text-danger"></i>';
    }
}
