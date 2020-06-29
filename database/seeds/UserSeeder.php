<?php

use App\User;
use App\Administrator;
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
        $user = Administrator::create([
            'name'=>'admin',
            'lastname'=>' one',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('secret'),
        ]);

        $user->assignRole('Administrator');
    }
}
