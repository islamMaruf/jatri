<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FareModule extends Model
{
    protected  $table = 'fares';
    protected  $guarded = ['*'];
   public function fromStoppage(){
       return $this->hasMany(Stoppage::class,'from_stoppage_id','id');
   }
   public function roadSequence(){
       return DB::table('roads')->where('id',1)->get('stoppage_sequence');
   }
    public function ToStoppage(){
        return $this->hasMany(Stoppage::class,'from_stoppage_id','id');
    }

}
