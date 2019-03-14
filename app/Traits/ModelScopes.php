<?php

namespace App\Traits;

trait ModelScopes{
    
    public function scopeInsertMsg($query,$country,$title,$content,$id,$ip){
        
        $query->create([
            'country' => $country,
            'title' => $title,
            'content' => $content,
            'user_id' => $id,
            'ip' => $ip
        ]);
    }

    
    public function scopeUpdateMsg($query,$id,$title,$content,$ip){
        $param = [
            'title'=>$title,
            'content'=>$content,
            'ip' => $ip
        ];
        $query->where('num',$id)->update($param);
    }


    public function scopeGetMsgs($query){
        return $query->with('user:id,name')->orderBy('created_at','desc')->paginate(10)->onEachSide(5);
    }


    public function scopeGetMsg($query,$id){
        return $query->with('user:id,name')->where('num',$id)->first();
    }

    public function scopeDeleteMsg($query,$id){
        $query->where('num',$id)->delete();
    }

    public function scopeSearchTitle($query,$search){
        return $query->where('title','LIKE',"%$search%")->orderBy('num', 'desc')->paginate(10)->onEachSide(5);
          
    }

    public function scopeSearchTitleCount($query,$search){
        return count($query->where('title','LIKE',"%$search%")->get());
        
     }

    public function scopeSearchContent($query,$search){
        return $query->where('content','LIKE',"%$search%")->orderBy('num', 'desc')->paginate(10)->onEachSide(5);
    }

    public function scopeSearchContentCount($query,$search){
        return count($query->where('content','LIKE',"%$search%")->get());     
    }

    public function scopeSearchTitleAndCotent($query,$search){
        return $query->where('title','LIKE',"%$search%")->orWhere('content','LIKE',"%$search%")->orderBy('num', 'desc')->paginate(10);
    }

    public function scopeSearchTitleAndCotentCount($query,$search){
        return count( $query->where('title','LIKE',"%$search%")->orWhere('content','LIKE',"%$search%")->get());
    }

    public function scopeUpdateHits($query,$id){
        $result = $query->where('num',$id)->first();
        $result->hits++;
        $result->save();
    }

    public function scopeUpdateCommend($query,$id){
        $result = $query->where('num',$id)->first();
        $result->commend++;
        $result->save();
    }

    public function scopeInsertComment($query,$content,$country,$board_id,$user_id,$ip){
        $param = [
            'content' => $content,
            'country' => $country,
            'board_id' => $board_id,
            'user_id' => $user_id,
            'ip' => $ip
        ];

        $query->create($param);
    }

    public function scopeGetComments($query,$id){
        return $query->with('user:id,name')->where('board_id',$id)->paginate(15);
    }

    public function scopeUpdateComments($query,$id,$content,$ip){
        $query->where('id',$id)->update(['content'=>$content,'ip' => $ip]);
    }

    public function scopeDeleteComments($query,$id){
        $query->where('id',$id)->delete();
    }



    // public function scopeSearchWriter($query,$name,$search){
    //     return
    //         $query->select([
    //             'users.name',
    //             $name.'.num',
    //             $name.'.country',
    //             $name.'.title',
    //             $name.'.hits',
    //             $name.'.commend',
    //             $name.'.created_at',
    //             $name.'.deleted_at'
    //             ])
    //         ->join($name, $name.'.user_id', '=', 'users.id')
    //         ->whereNull($name.'.deleted_at') 
    //         ->where('users.name', 'LIKE', "%$search%")
    //         ->orderBy('num', 'desc')
    //         ->paginate(10)
    //         ->onEachSide(5);
    // }
  
    // public function scopeSearchWriterCount($query,$name,$search){

    //     return 
    //         count($query->join($name, $name.'.user_id', '=', 'users.id')
    //         ->whereNull($name.'.deleted_at')
    //         ->where('users.name', 'LIKE', "%$search%")
    //         ->get());
             
    // }
}

?>