<?php

use Illuminate\Database\Seeder;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Attendance::class, 1000)->create()->each(function ($type){
        $type->save();
      });
    }
}
