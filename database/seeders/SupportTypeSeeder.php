<?php

namespace Database\Seeders;

use App\Models\SupportType;
use Illuminate\Database\Seeder;

class SupportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SupportType::factory()
            ->count(5)
            ->create();
    }
}
