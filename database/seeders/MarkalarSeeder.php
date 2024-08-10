<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Markalar;

class MarkalarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Markalar::insert(
            [
                [
                    'baslik' => 'Marka 1',
                    'logo' => '/default/marka1.jpg',
                    'isActive' => '1',
                    'sira' => '1',
                    'link' => '#',
                ],
                [
                    'baslik' => 'Marka 2',
                    'logo' => '/default/marka1.jpg',
                    'isActive' => '1',
                    'sira' => '2',
                    'link' => '#',
                ],

            ]
        );
    }
}
