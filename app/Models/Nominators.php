<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominators extends Model
{
    use HasFactory;

    protected $fillable = ['ref', 'name', 'nic', 'dob', 'party', 'address', 'city', 'gender', 'province', 'status'];

    public static $status = [1 => 'Active', 2 => 'Inactive', 3 => 'Deleted'];

    public static function laratablesStatus($rec)
    {
        return '<span class="badge badge-' . (new Colors)->getColor($rec['status']) . '">' . self::$status[$rec['status']] . '</span>';
    }

    public static function laratablesCustomAction($rec)
    {
        return '<i onclick="doEdit(' . $rec['id'] . ')" class="la la-edit ml1 text-warning"></i><i onclick="doDelete(' . $rec['id'] . ')" class="la la-trash ml-1 text-danger"></i>';
    }

    public static function laratablesProvince($rec)
    {
        return Provinces::$list[$rec->province];
    }

    public static function laratablesParty($rec)
    {
        return $rec->partyData->name;
    }

    public static function laratablesCustomInfo($rec)
    {
        return $rec->name . '<br/><small>' . $rec->nic . '</small>';
    }

    public static function laratablesAdditionalColumns()
    {
        return ['name', 'nic'];
    }

    public static function laratablesSearchableColumns()
    {
        return ['name', 'ref'];
    }

    public static function laratablesQueryConditions($query)
    {
        return $query->whereIn('status', [1, 2])->with('partyData');
    }

    public function partyData()
    {
        return $this->hasOne(Party::class, 'id', 'party');
    }
}
