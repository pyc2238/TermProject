<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Model;

class Admin_Notice_ip extends Model
{
    protected $fillable = ['id','ip','boardNum'];
    public $timestamps = false;



    public function getHitsIp($ip,$boardNum){
        
        return $this->where('ip',$ip)->where(function ($query) use($boardNum) { $query->where('boardNum',$boardNum);})->first();
        
    }

    public function insertHitIp($boardNum,$ip){
        $this->create([
            'boardNum' => $boardNum,
            'ip' => $ip
        ]);
    }
}
