<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Hồ Đình Hiệp";
        $user->email = "dinhhiep@gmail.com";
        $user->password ="12345678";
        $user->save();
    }
}
