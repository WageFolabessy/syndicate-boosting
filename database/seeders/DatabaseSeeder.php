<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        $this->call([
            FaqSeeder::class,
        ]);
        $this->call([
            GameSeeder::class,
        ]);
        $this->call([
            ApexLegendRankCategorySeeder::class,
        ]);
        $this->call([
            ApexLegendGameRankTierSeeder::class,
        ]);
        $this->call([
            ApexLegendGameRankTierDetailSeeder::class,
        ]);
        $this->call([
            MobileLegendRankCategorySeeder::class,
        ]);
        $this->call([
            MobileLegendGameRankTierSeeder::class,
        ]);
        $this->call([
            MobileLegendGameRankTierDetailSeeder::class,
        ]);
    }
}
