<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call( UserSeeder::class);
        $this->call( AyarlarSeeder::class);
        $this->call( LangSeeder::class);
        $this->call( ContentSeeder::class);
        $this->call( CevirilerSeeder::class);
        $this->call( MenuSeeder::class);
        $this->call( IcerikSeeder::class);
        $this->call( MarkalarSeeder::class); 
        $this->call( YetkilerSeeder::class);

    }
}

