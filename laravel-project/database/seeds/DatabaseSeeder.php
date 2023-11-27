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
        // $this->call(UsersTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(OsTableSeeder::class);
        $this->call(TimesTableSeeder::class);
    }
}
