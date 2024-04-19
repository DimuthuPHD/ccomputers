<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::truncate();
        $categories = [
            [
                'name' => 'Laptops',
                'children' => ['Gaming Laptops', 'Ultrabooks', 'Business Laptops'],
            ],
            [
                'name' => 'Desktops',
                'children' => ['Gaming Desktops', 'Workstations', 'All-in-One PCs'],
            ],
            [
                'name' => 'Monitors',
                'children' => ['Gaming Monitors', 'Ultrawide Monitors', '4K Monitors'],
            ],
            [
                'name' => 'Keyboards',
                'children' => ['Mechanical Keyboards', 'Wireless Keyboards', 'Gaming Keyboards'],
            ],
            [
                'name' => 'Mice',
                'children' => ['Wireless Mice', 'Gaming Mice', 'Ergonomic Mice'],
            ],
            [
                'name' => 'Printers',
                'children' => ['Inkjet Printers', 'Laser Printers', 'All-in-One Printers'],
            ],
            [
                'name' => 'Networking',
                'children' => ['Routers', 'Switches', 'Access Points'],
            ],
            [
                'name' => 'Storage',
                'children' => ['Solid State Drives (SSD)', 'Hard Disk Drives (HDD)', 'External Hard Drives'],
            ],
            [
                'name' => 'Graphics Cards',
                'children' => ['NVIDIA Graphics Cards', 'AMD Graphics Cards', 'Workstation Graphics Cards'],
            ],
            [
                'name' => 'Processors (CPUs)',
                'children' => ['Intel Core Processors', 'AMD Ryzen Processors', 'Server Processors'],
            ],
            [
                'name' => 'Motherboards',
                'children' => ['ATX Motherboards', 'Mini-ITX Motherboards', 'Gaming Motherboards'],
            ],
            [
                'name' => 'RAM (Memory)',
                'children' => ['DDR4 RAM', 'RGB RAM', 'Laptop RAM'],
            ],
            [
                'name' => 'Power Supplies (PSUs)',
                'children' => ['Modular Power Supplies', '80 Plus Gold PSUs', 'High Wattage PSUs'],
            ],
            [
                'name' => 'Cases (PC Chassis)',
                'children' => ['Mid Tower Cases', 'Full Tower Cases', 'Mini-ITX Cases'],
            ],
            [
                'name' => 'Sound Cards',
                'children' => ['External Sound Cards', 'PCIe Sound Cards', 'USB Sound Cards'],
            ],
            [
                'name' => 'Cooling Solutions',
                'children' => ['CPU Air Coolers', 'Liquid CPU Coolers', 'Case Fans'],
            ],
            [
                'name' => 'Webcams',
                'children' => ['Full HD Webcams', '4K Webcams', 'Wide-angle Webcams'],
            ],
            [
                'name' => 'Headsets',
                'children' => ['Gaming Headsets', 'Wireless Headsets', 'Noise-canceling Headsets'],
            ],
            [
                'name' => 'Microphones',
                'children' => ['USB Microphones', 'XLR Microphones', 'Shotgun Microphones'],
            ],
            [
                'name' => 'UPS (Uninterruptible Power Supply)',
                'children' => ['Line-interactive UPS', 'Online UPS', 'Offline UPS'],
            ],
        ];


        foreach ($categories as $categoryData) {
            $category = Category::create(['name' => $categoryData['name']]);
            foreach ($categoryData['children'] as $childName) {
                $child = new Category(['name' => $childName]);
                $category->children()->save($child);
            }
        }
    }
}
