<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Quản trị viên';
        $user->email = 'admin@epu.edu.vn';
        $user->password = bcrypt('123456');
        $user->admin = true;
        $user->actived = true;
        $user->save();
        $user = new User();
        $user->name = 'Giảng viên';
        $user->email = 'giangvien@epu.edu.vn';
        $user->password = bcrypt('123456');
        $user->teacher = true;
        $user->actived = true;
        $user->save();
        $user = new User();
        $user->name = 'Sinh viên';
        $user->email = 'sinhvien@epu.edu.vn';
        $user->password = bcrypt('123456');
        $user->actived = true;
        $user->save();
    }
}
