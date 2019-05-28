<?php

use Illuminate\Database\Seeder;

class ServiceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\ServiceType::class, 11)->create()->each(function ($type){
          $type->save();
        });
    }
}
