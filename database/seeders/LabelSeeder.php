<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Label::create([
            'name' => 'Trending',
        ]);
        Label::create([
            'name' => 'Best Seller',
        ]);
        Label::create([
            'name' => 'Terverifikasi',
        ]);
    }
}
