<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,

            
        ]);
        
        // $this->call(RolePermissionSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
