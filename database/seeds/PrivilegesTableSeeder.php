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
            ['level' => '100', 'name' => '最高權限'],
            ['level' => '50', 'name' => '管理者']
        ]);
    }
}
