<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(PrivilegesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FunctionTypeSeeder::class);
        $this->call(CategorySeeder::class);

        Model::reguard();
    }
}
