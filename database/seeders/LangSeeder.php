<?php

namespace Database\Seeders;

use App\Models\Lang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lang::insert(
            [
                [
                    'baslik' => 'Türkçe',
                    'kisabaslik' => 'TR',
                    'kod' => 'tr',
                    'icon' => '/default/tr.png',
                    'varsayilan' => '1',
                    'isActive' => '1',
                    'sira' => '1',
                ]

            ]
        );
    }
}
