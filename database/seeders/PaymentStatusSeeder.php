<?php

namespace Database\Seeders;

use App\Models\PaymentStasus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'PENDING',
            'PAID',
            'CANCELED'
        ];


        foreach ($statuses as $status) {
            PaymentStasus::updateOrCreate(['status' =>$status]);
        }
    }
}
