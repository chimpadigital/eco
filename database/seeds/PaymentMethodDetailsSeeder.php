<?php

use Illuminate\Database\Seeder;
use App\Models\PaymentMethodDetail;

class PaymentMethodDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethodDetail::insert([
            [
                'description'=>'Pago de manuales de eco inclusion',
                'amount'=>'150',
                'payment_method_id'=>1,
            ],
            [
                'description'=>'Pago de manuales de eco inclusion',
                'amount'=>'150',
                'payment_method_id'=>2,
            ],
        ]);
    }
}
