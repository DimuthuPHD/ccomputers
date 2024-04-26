<?php

namespace Database\Seeders;

use App\Models\OrderStasus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $statuses = [
            'PENDING',
            'PROCESSING',
            'SHIPPED',
            'DELIVERED',
            'CANCELED'
        ];

        foreach ($statuses as $status) {
            OrderStasus::updateOrCreate(['status' =>$status]);
        }
    }
}
