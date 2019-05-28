<?php

use Illuminate\Database\Seeder;

class CollectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Collection::class, 1000)->create()->each(function ($type){
        $type->save();
      });
    }
}
