<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $guarded = [];

    protected $table = "events";

    public  function  inplayes()
    {
        return $this->hasMany('App\Match')->whereStatus(1)->latest()->limit(5);
    }
    public  function  matches()
    {
        $now = Carbon::now();
        return $this->hasMany('App\Match')->where('end_date','>', $now)->orderBy('start_date','asc');
    }

}
