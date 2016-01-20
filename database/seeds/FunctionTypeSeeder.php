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
            'name' => 'Blog',
            'name_en' => 'Blog',
            'code' => 'blog',
            'user_id' => '1'
        ]);

        DB::table('admin_function_types')->insert([
            'name' => 'Diary',
            'name_en' => 'Diary',
            'code' => 'diary',
            'user_id' => '1'
        ]);
    }
}
