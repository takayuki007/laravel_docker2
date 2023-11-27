<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('os')->insert([
            'name'=>'Windows',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('os')->insert([
            'name'=>'Mac',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

    }
}
