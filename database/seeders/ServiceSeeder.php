<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Cleaning Rumah Standar',
                'description' => 'Pembersihan rumah secara menyeluruh termasuk menyapu, mengepel, dan membersihkan debu di seluruh ruangan',
                'price' => 150000,
                'category' => 'Rumah',
                'duration_minutes' => 120,
                'is_active' => true
            ],
            [
                'name' => 'Deep Cleaning Rumah',
                'description' => 'Pembersihan mendalam untuk seluruh area rumah termasuk sudut-sudut tersembunyi, kaca, dan area sulit dijangkau',
                'price' => 350000,
                'category' => 'Rumah',
                'duration_minutes' => 240,
                'is_active' => true
            ],
            [
                'name' => 'Cleaning Kantor',
                'description' => 'Pembersihan area kantor dan ruang kerja profesional termasuk area meeting room',
                'price' => 250000,
                'category' => 'Kantor',
                'duration_minutes' => 180,
                'is_active' => true
            ],
            [
                'name' => 'Cleaning Kaca Gedung',
                'description' => 'Pembersihan khusus untuk kaca gedung dan jendela dengan peralatan profesional',
                'price' => 200000,
                'category' => 'Eksterior',
                'duration_minutes' => 120,
                'is_active' => true
            ],
            [
                'name' => 'Cleaning Karpet',
                'description' => 'Pembersihan karpet dengan teknologi khusus untuk menghilangkan noda membandel',
                'price' => 180000,
                'category' => 'Spesial',
                'duration_minutes' => 150,
                'is_active' => true
            ],
            [
                'name' => 'Cleaning AC',
                'description' => 'Pembersihan dan perawatan AC termasuk bongkar pasang dan penggantian filter',
                'price' => 120000,
                'category' => 'Spesial',
                'duration_minutes' => 90,
                'is_active' => true
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}