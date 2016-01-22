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
        $user->description = 'Stay hungry, stay foolish.';
        $user->save();

        $user = new \App\User();
        $user->password = bcrypt('111111');
        $user->email    = 'ganboonhong2@gmail.com';
        $user->level    = 100;
        $user->name     = 'Francis';
        $user->description = 'Stay hungry, stay foolish.';
        $user->save();

        $user = new \App\User();
        $user->password = bcrypt('tom');
        $user->email    = 'tom@gmail.com';
        $user->level    = 100;
        $user->name     = 'Tom';
        $user->save();

        $user = new \App\User();
        $user->password = bcrypt('admin');
        $user->email    = 'admin@gmail.com';
        $user->level    = 50;
        $user->name     = 'Administrator';
        $user->save();

        $user = new \App\User();
        $user->password = bcrypt('guest');
        $user->email    = 'guest@gmail.com';
        $user->level    = 10;
        $user->name     = 'Guest';
        $user->save();
    }
}
