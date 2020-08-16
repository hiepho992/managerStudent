<?php

use App\Classe;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classe = new Classe();
        $classe->name = "Anh_01";
        $classe->date_start = now();
        $classe->date_end = now();
        $classe->subject_id = 1;
        $classe->save();

        $classe = new Classe();
        $classe->name = "Pháp_01";
        $classe->date_start = now();
        $classe->date_end = now();
        $classe->subject_id = 2;
        $classe->save();

        $classe = new Classe();
        $classe->name = "Nhật_01";
        $classe->date_start = now();
        $classe->date_end = now();
        $classe->subject_id = 3;
        $classe->save();

        $classe = new Classe();
        $classe->name = "Trung_01";
        $classe->date_start = now();
        $classe->date_end = now();
        $classe->subject_id = 4;
        $classe->save();
    }
}
