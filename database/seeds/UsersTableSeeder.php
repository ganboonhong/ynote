<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->password = bcrypt('111111');
        $user->email    = 'ganboonhong@gmail.com';
        $user->level    = 100;
        $user->name     = 'Francis';
        $user->save();
    }
}
