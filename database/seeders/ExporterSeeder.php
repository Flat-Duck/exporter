<?php

namespace Database\Seeders;

use App\Models\Exporter;
use Illuminate\Database\Seeder;

class ExporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exporter::factory()
            ->count(5)
            ->create();
    }
}
