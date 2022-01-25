<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@ap.id',
                'password' => Hash::make('user123'),
                'role' => 'superadmin'
            ],
        );
        User::create(
            [
                'name' => 'Teknisi',
                'email' => 'teknisi@ap.id',
                'password' => Hash::make('user123'),
                'role' => 'teknisi'
            ]
        );
        User::create(
            [
                'name' => 'Viewer',
                'email' => 'viewer@ap.id',
                'password' => Hash::make('user123'),
                'role' => 'viewer'
            ],
        );
    }
}
