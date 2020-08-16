<?php

use App\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = new Subject();
        $subject->name = "Tiếng Anh";
        $subject->save();

        $subject = new Subject();
        $subject->name = "Tiếng Pháp";
        $subject->save();

        $subject = new Subject();
        $subject->name = "Tiếng Nhật";
        $subject->save();

        $subject = new Subject();
        $subject->name = "Tiếng Trung";
        $subject->save();
    }
}
