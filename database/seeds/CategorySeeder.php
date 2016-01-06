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
            'name' => '程式設計',
            'name_en' => 'Programming'
        ]);

        DB::table('categories')->insert([
            'name' => '食物',
            'name_en' => 'Food'
        ]);

        DB::table('categories')->insert([
            'name' => '旅遊',
            'name_en' => 'Travelling'
        ]);
    }
}
