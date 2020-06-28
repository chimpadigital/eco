<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(PaymentMethodDetailsSeeder::class);
        $this->call(StatusPaymentSeeder::class);
        $this->call(CountrySeeder::class);
        
    }
}
