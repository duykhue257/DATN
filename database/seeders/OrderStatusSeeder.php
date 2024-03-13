<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
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
                'status'=>'chờ thanh toán'
            ],
            [
                'id'=>2,
                'status'=>'chờ xác nhận'
            ],
            [
                'id'=>3,
                'status'=>'đã xác nhận'
            ],
            [
                'id'=>4,
                'status'=>'đang vận chuyển'
            ],
            [
                'id'=>5,
                'status'=>'giao hàng thành công'
            ],
            [
                'id'=>6,
                'status'=>'giao hàng thất bại'
            ]

        ];
        foreach($data as $status){
            OrderStatus::create($status);
        }
    }
}
