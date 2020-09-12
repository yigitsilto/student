<?php

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

            DB::table('users')->insert([
                'name' => "Ahmet",
                'email' => 'Ahmet@gmail.com',
                'password' => Hash::make('password'),
                'authority' => "0",
                'student_code' => Str::random(12),
                'class_teacher'=>"A Öğretmen",
                'class_name'=>"A Sınıfı",
                'student_id'=>"0",
            ]);
        DB::table('users')->insert([
            'name' => "Mehmet",
            'email' => 'Mehmet@gmail.com',
            'password' => Hash::make('password'),
            'authority' => "0",
            'student_code' => Str::random(12),
            'class_teacher'=>"B Öğretmen",
            'class_name'=>"B Sınıfı",
            'student_id'=>"0",
        ]);



    }
}
