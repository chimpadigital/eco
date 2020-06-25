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
        $user = User::create([
            'name'=>'admin',
            'lastname'=>' one',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('secret'),
        ]);

        $user->assignRole('Administrator');
    }
}
