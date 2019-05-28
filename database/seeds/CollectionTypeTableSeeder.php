<?php

use Illuminate\Database\Seeder;

class CollectionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\CollectionsType::class, 7)->create()->each(function ($type){
        $type->save();
      });
    }
}
