<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $fillable=['message','election','by'];

    public function electionData()
    {
        return $this->hasOne(Election::class, 'id', 'election');
    }

    public function userData()
    {
        return $this->hasOne(User::class, 'id', 'by');
    }
}
