<?php

use App\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = new Teacher();
        $teacher->fullName = "Nguyễn A";
        $teacher->dateOfBirth = now();
        $teacher->gender = 1;
        $teacher->nation = "Việt Nam";
        $teacher->phone = "0123456789";
        $teacher->email = Str::random(10).'@gmail.com';
        $teacher->address = Str::random(10);
        $teacher->specialize = "Cử nhân Tiếng Anh";
        $teacher->salary = 5000000;
        $teacher->classe_id = 1;
        $teacher->save();

        $teacher = new Teacher();
        $teacher->fullName = "Nguyễn Thanh An";
        $teacher->dateOfBirth = now();
        $teacher->gender = 0;
        $teacher->nation = "Việt Nam";
        $teacher->phone = "0223456789";
        $teacher->email = Str::random(10).'@gmail.com';
        $teacher->address = Str::random(10);
        $teacher->specialize = "Cử nhân Tiếng Pháp";
        $teacher->salary = 10000000;
        $teacher->classe_id = 2;
        $teacher->save();

        $teacher = new Teacher();
        $teacher->fullName = "Nguyễn Ánh";
        $teacher->dateOfBirth = now();
        $teacher->gender = 0;
        $teacher->nation = "Việt Nam";
        $teacher->phone = "0222456789";
        $teacher->email = Str::random(10).'@gmail.com';
        $teacher->address = Str::random(10);
        $teacher->specialize = "Cử nhân Tiếng Nhật";
        $teacher->salary = 8000000;
        $teacher->classe_id = 3;
        $teacher->save();

        $teacher = new Teacher();
        $teacher->fullName = "Nguyễn Tiến";
        $teacher->dateOfBirth = now();
        $teacher->gender = 1;
        $teacher->nation = "Việt Nam";
        $teacher->phone = "0123226789";
        $teacher->email = Str::random(10).'@gmail.com';
        $teacher->address = Str::random(10);
        $teacher->specialize = "Cử nhân Tiếng Trung";
        $teacher->salary = 5000000;
        $teacher->classe_id = 4;
        $teacher->save();
    }
}
