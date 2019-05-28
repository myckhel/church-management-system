<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
        // UserTableSeeder::class,
        // MemberTableSeeder::class,
        // ServiceTypeTableSeeder::class,
        // CollectionTypeTableSeeder::class,
        // AttendanceTableSeeder::class,
        CollectionTableSeeder::class,
      ]);
    }
}
