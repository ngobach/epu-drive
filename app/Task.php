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


    public function files(){
        return $this->hasMany('App\File');
    }


    /**
     * Check if this task is expired
     * @return boolean expired?
     */
    public function expired(){
    	return $this->end_at->lt(Carbon::now());
    }

    /**
     * Check if user has submited file to this task
     * @param  App\User  $user User to check
     * @return boolean 
     */
    public function canSubmit(User $user){
        return $this->files()->where('user_id', $user->id)->count() == 0;
    }
}
