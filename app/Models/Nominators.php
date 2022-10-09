<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominators extends Model
{
    use HasFactory;

    protected $fillable = ['ref', 'name', 'nic', 'dob', 'party', 'election', 'address', 'city', 'gender', 'province', 'status'];

    public static $status = [1 => 'Approved', 2 => 'Pending', 3 => 'Declined'];

    public static function laratablesStatus($rec)
    {
        return '<span class="badge badge-' . (new Colors)->getColor($rec['status']) . '">' . self::$status[$rec['status']] . '</span>';
    }

    public static function laratablesCustomAction($rec)
    {
        $approveButton = '';
        if (doPermitted('//nominators/approve')) {
            $approveButton = '<i onclick="doApprove(' . $rec['id'] . ')" class="la la-check ml-1 text-success"></i>';
        }
        return $approveButton.'<i onclick="doEdit(' . $rec['id'] . ')" class="la la-edit ml1 text-warning ml-1"></i><i onclick="doDelete(' . $rec['id'] . ')" class="la la-trash ml-1 text-danger"></i>';
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

    public function electionData()
    {
        return $this->hasOne(Election::class, 'id', 'election');
    }

}
