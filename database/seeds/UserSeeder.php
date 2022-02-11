<?php
use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = User::orderBy('id','desc')->first();
        $roles = ['4'];
    
        if ($roles != null) {
           
            foreach ($roles as $role) {
                $data->assignRole($role);
            }
        }
        
    }
}
