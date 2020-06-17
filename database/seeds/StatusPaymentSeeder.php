<?php

use App\Models\StatusPayment;
use Illuminate\Database\Seeder;

class StatusPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusPayment::insert([
            ['name'=>'approved'],
            ['name'=>'create'],
            ['name'=>'pending'],
            ['name'=>'cancel'],
        ]);
    }
}
