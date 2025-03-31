<?php

namespace Database\Seeders;

use App\Models\GameRankCategory;
use App\Models\GameRankTier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApexLegendGameRankTierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Rookie'    => GameRankCategory::where('name', 'Rookie')->first()?->id,
            'Bronze'    => GameRankCategory::where('name', 'Bronze')->first()?->id,
            'Silver'    => GameRankCategory::where('name', 'Silver')->first()?->id,
            'Gold'      => GameRankCategory::where('name', 'Gold')->first()?->id,
            'Platinum'  => GameRankCategory::where('name', 'Platinum')->first()?->id,
            'Diamond'   => GameRankCategory::where('name', 'Diamond')->first()?->id,
        ];

        $tiers = [
            [
                'game_rank_category_id' => $categories['Rookie'],
                'tier'                  => 'IV',
                // 'progress_target'       => 0,
                // 'price'                 => 2000,
            ],
            [
                'game_rank_category_id' => $categories['Rookie'],
                'tier'                  => 'III',
                // 'progress_target'       => 50,
                // 'price'                 => 3000,
            ],
            [
                'game_rank_category_id' => $categories['Rookie'],
                'tier'                  => 'II',
                // 'progress_target'       => 100,
                // 'price'                 => 5000,
            ],
            [
                'game_rank_category_id' => $categories['Rookie'],
                'tier'                  => 'I',
                // 'progress_target'       => 150,
                // 'price'                 => 5000,
            ],
            // Bronze
            [
                'game_rank_category_id' => $categories['Bronze'],
                'tier'                  => 'IV',
                // 'progress_target'       => 200,
                // 'price'                 => 6000,
            ],
            [
                'game_rank_category_id' => $categories['Bronze'],
                'tier'                  => 'III',
                // 'progress_target'       => 250,
                // 'price'                 => 7000,
            ],
            [
                'game_rank_category_id' => $categories['Bronze'],
                'tier'                  => 'II',
                // 'progress_target'       => 300,
                // 'price'                 => 8000,
            ],
            [
                'game_rank_category_id' => $categories['Bronze'],
                'tier'                  => 'I',
                // 'progress_target'       => 350,
                // 'price'                 => 9000,
            ],
            // Silver
            [
                'game_rank_category_id' => $categories['Silver'],
                'tier'                  => 'IV',
                // 'progress_target'       => 400,
                // 'price'                 => 10000,
            ],
            [
                'game_rank_category_id' => $categories['Silver'],
                'tier'                  => 'III',
                // 'progress_target'       => 450,
                // 'price'                 => 11000,
            ],
            [
                'game_rank_category_id' => $categories['Silver'],
                'tier'                  => 'II',
                // 'progress_target'       => 500,
                // 'price'                 => 12000,
            ],
            [
                'game_rank_category_id' => $categories['Silver'],
                'tier'                  => 'I',
                // 'progress_target'       => 550,
                // 'price'                 => 13000,
            ],
            // Gold
            [
                'game_rank_category_id' => $categories['Gold'],
                'tier'                  => 'IV',
                // 'progress_target'       => 600,
                // 'price'                 => 14000,
            ],
            [
                'game_rank_category_id' => $categories['Gold'],
                'tier'                  => 'III',
                // 'progress_target'       => 650,
                // 'price'                 => 15000,
            ],
            [
                'game_rank_category_id' => $categories['Gold'],
                'tier'                  => 'II',
                // 'progress_target'       => 700,
                // 'price'                 => 16000,
            ],
            [
                'game_rank_category_id' => $categories['Gold'],
                'tier'                  => 'I',
                // 'progress_target'       => 750,
                // 'price'                 => 17000,
            ],
            // Platinum
            [
                'game_rank_category_id' => $categories['Platinum'],
                'tier'                  => 'IV',
                // 'progress_target'       => 800,
                // 'price'                 => 18000,
            ],
            [
                'game_rank_category_id' => $categories['Platinum'],
                'tier'                  => 'III',
                // 'progress_target'       => 850,
                // 'price'                 => 19000,
            ],
            [
                'game_rank_category_id' => $categories['Platinum'],
                'tier'                  => 'II',
                // 'progress_target'       => 900,
                // 'price'                 => 20000,
            ],
            [
                'game_rank_category_id' => $categories['Platinum'],
                'tier'                  => 'I',
                // 'progress_target'       => 950,
                // 'price'                 => 21000,
            ],
            // Diamond
            [
                'game_rank_category_id' => $categories['Diamond'],
                'tier'                  => 'IV',
                // 'progress_target'       => 1000,
                // 'price'                 => 22000,
            ],
            [
                'game_rank_category_id' => $categories['Diamond'],
                'tier'                  => 'III',
                // 'progress_target'       => 1050,
                // 'price'                 => 23000,
            ],
            [
                'game_rank_category_id' => $categories['Diamond'],
                'tier'                  => 'II',
                // 'progress_target'       => 1100,
                // 'price'                 => 24000,
            ],
            [
                'game_rank_category_id' => $categories['Diamond'],
                'tier'                  => 'I',
                // 'progress_target'       => 1150,
                // 'price'                 => 25000,
            ],
        ];

        foreach ($tiers as $tier) {
            GameRankTier::create($tier);
        }
    }
}
