<?php

use Illuminate\Database\Seeder;

class FunctionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_function_types')->insert([
            'name' => '部落格'
        ]);

        DB::table('admin_function_types')->insert([
            'name' => '個人日記'
        ]);
    }
}
