<?php

use Illuminate\Database\Seeder;

class PrivilegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privileges')->insert([
            ['level' => '100',  'name' => 'Root' ],
            ['level' => '50 ',  'name' => 'Admin'],
            ['level' => '10 ',  'name' => 'Guest'],
        ]);
    }
}
