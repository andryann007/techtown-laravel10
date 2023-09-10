<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name'          => 'Andryan',
            'email'         => 'andryanace@gmail.com',
            'password'      => '12345678'
        ]);

        DB::table('kategori')->insert([
            [
                'nama'          => 'Smartphone',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'nama'          => 'Tablet',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'nama'          => 'Notebook',
                'created_at'    => now(),
                'updated_at'    => now()
            ]
        ]);

        DB::table('brand')->insert([
            [
                'nama'          => 'Apple',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'nama'          => 'Samsung',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'nama'          => 'Asus',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'nama'          => 'Xiaomi',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'nama'          => 'Oppo',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'nama'          => 'Vivo',
                'created_at'    => now(),
                'updated_at'    => now()
            ]
        ]);
    }
}
