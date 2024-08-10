<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'name' => 'Admin',
                    'email' => 'admin@mail.com',
                    'password' => '$2y$10$cXIdAYoYJvmR0EqxmFMVCOqcJrg30BKoycS6bkT0/dKU0W8SeqM8q',
                    'user_type' => 'admin',
                    'isActive' => 1,
                    'yetki_id' => 1,
                ],
                
                [
                    'name' => 'Editör',
                    'email' => 'editor@mail.com',
                    'password' => '$2y$10$cXIdAYoYJvmR0EqxmFMVCOqcJrg30BKoycS6bkT0/dKU0W8SeqM8q',
                    'user_type' => 'admin',
                    'isActive' => 1,
                    'yetki_id' => 2,
                ],
                
                [
                    'name' => 'Normal User',
                    'email' => 'user@mail.com',
                    'password' => '$2y$10$cXIdAYoYJvmR0EqxmFMVCOqcJrg30BKoycS6bkT0/dKU0W8SeqM8q',
                    'user_type' => 'user',
                    'isActive' => 1,
                    'yetki_id' => 0,
                ]
            ]
        );
    }
}
