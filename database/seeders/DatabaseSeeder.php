<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);

        $this->call(AdSeeder::class);
        $this->call(CardSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(ExporterSeeder::class);
        $this->call(SupportSeeder::class);
        $this->call(SupportTypeSeeder::class);
        $this->call(UserSeeder::class);
    }
}
