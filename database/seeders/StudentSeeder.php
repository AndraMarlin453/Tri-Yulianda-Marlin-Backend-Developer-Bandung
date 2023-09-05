<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Student::insert([
        //     'name' => 'Joko',
        //     'gender' => 'Laki-laki',
        //     'agama' => 'Islam',
        //     'nis' => '010101011',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        Student::factory()->count(20)->create();
    }
}
