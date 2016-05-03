<?php

use Illuminate\Database\Seeder;
use App\Task;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
        	'user_id' => 1,
        	'title' => 'Phần mềm nguồn mở',
        	'description' => 'Báo cáo phầm mềm nguồn mở',
        	'end_at' => '2016-06-01'
    	]);
    }
}
