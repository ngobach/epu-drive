<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \File as FS;
class File extends Model
{
	// Do not guard anything
    protected $guarded = [];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function task(){
        return $this->belongsTo('App\Task');
    }


    /**
     * Get URL to file or null if file was deleted
     * 
     * @return boolean|string URL to file or null if file was deled
     */
    public function url(){
    	$realPath = public_path($this->file_path);
    	if (file_exists($realPath))
    		return asset($this->file_path);
    	return false;
    }

    
    /**
     * Remove real file and delete itself
     * @return boolean Success?
     */
    public function remove() {
		return FS::deleteDirectory(public_path(dirname($this->file_path)));
    }
}
