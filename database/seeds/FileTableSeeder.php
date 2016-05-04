<?php

use Illuminate\Database\Seeder;
use App\File;
use App\Task;
use App\User;
class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = User::where('admin', false)->where('teacher',false)->get();
        Task::all()->each(function ($t) use ($users) {
        	$users->each(function ($u) use ($t) {
        		$t->files()->save(factory(File::class)->make(['user_id' => $u->id]));
        	});
        });
    }
}
