<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $guarded = [];

    public function getEndAtAttribute()
    {
    	return new Carbon($this->attributes['end_at']);
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
