<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'id'=>1,
                'method'=>'Thanh toán khi nhận hàng'
            ],
            [
                'id'=>2,
                'method'=>'Thanh toán qua VNpay'
            ],

        ];
        foreach($data as $status){
            Payment::create($status);
        }
    }
}
