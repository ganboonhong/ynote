<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Programming',
            'name_en' => 'Programming',
            'user_id' => 1
        ]);

        DB::table('categories')->insert([
            'name' => 'Food',
            'name_en' => 'Food',
            'user_id' => 1
        ]);

        DB::table('categories')->insert([
            'name' => 'Travelling',
            'name_en' => 'Travelling',
            'user_id' => 1
        ]);
    }
}
