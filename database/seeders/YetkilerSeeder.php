<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Yetki;

class YetkilerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Yetki::insert(
            [
                [
                    'id' => 1,
                    'baslik' => 'Admin',
                    'permissions' => '{"tasarimayar":"on","ayarlar":"on","diller":"on","translate":"on","menu":"on","iceriksayfalar":"on","slider":"on","markalar":"on","urunler":"on","yetkiler":"on"}', 
                    'isActive' => 1,
                     
                ],
                
                [
                    'id' => 2,
                    'baslik' => 'Editör',
                    'permissions' => '{"ayarlar":"on","iceriksayfalar":"on","slider":"on","markalar":"on","urunler":"on"}', 
                    'isActive' => 1,
                ] 
            ]
        );
    }
}
