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
            // Rookie
            [
                'game_rank_category_id' => $categories['Rookie'],
                'tier'                  => 'I',
                'progress_target'       => null,
                'price'                 => 2000,
            ],
            [
                'game_rank_category_id' => $categories['Rookie'],
                'tier'                  => 'II',
                'progress_target'       => null,
                'price'                 => 3000,
            ],
            [
                'game_rank_category_id' => $categories['Rookie'],
                'tier'                  => 'III',
                'progress_target'       => null,
                'price'                 => 5000,
            ],
            [
                'game_rank_category_id' => $categories['Rookie'],
                'tier'                  => 'IV',
                'progress_target'       => null,
                'price'                 => 5000,
            ],
            // Bronze
            [
                'game_rank_category_id' => $categories['Bronze'],
                'tier'                  => 'I',
                'progress_target'       => null,
                'price'                 => 6000,
            ],
            [
                'game_rank_category_id' => $categories['Bronze'],
                'tier'                  => 'II',
                'progress_target'       => null,
                'price'                 => 7000,
            ],
            [
                'game_rank_category_id' => $categories['Bronze'],
                'tier'                  => 'III',
                'progress_target'       => null,
                'price'                 => 8000,
            ],
            [
                'game_rank_category_id' => $categories['Bronze'],
                'tier'                  => 'IV',
                'progress_target'       => null,
                'price'                 => 9000,
            ],
            // Silver
            [
                'game_rank_category_id' => $categories['Silver'],
                'tier'                  => 'I',
                'progress_target'       => null,
                'price'                 => 10000,
            ],
            [
                'game_rank_category_id' => $categories['Silver'],
                'tier'                  => 'II',
                'progress_target'       => null,
                'price'                 => 11000,
            ],
            [
                'game_rank_category_id' => $categories['Silver'],
                'tier'                  => 'III',
                'progress_target'       => null,
                'price'                 => 12000,
            ],
            [
                'game_rank_category_id' => $categories['Silver'],
                'tier'                  => 'IV',
                'progress_target'       => null,
                'price'                 => 13000,
            ],
            // Gold
            [
                'game_rank_category_id' => $categories['Gold'],
                'tier'                  => 'I',
                'progress_target'       => null,
                'price'                 => 14000,
            ],
            [
                'game_rank_category_id' => $categories['Gold'],
                'tier'                  => 'II',
                'progress_target'       => null,
                'price'                 => 15000,
            ],
            [
                'game_rank_category_id' => $categories['Gold'],
                'tier'                  => 'III',
                'progress_target'       => null,
                'price'                 => 16000,
            ],
            [
                'game_rank_category_id' => $categories['Gold'],
                'tier'                  => 'IV',
                'progress_target'       => null,
                'price'                 => 17000,
            ],
            // Platinum
            [
                'game_rank_category_id' => $categories['Platinum'],
                'tier'                  => 'I',
                'progress_target'       => null,
                'price'                 => 18000,
            ],
            [
                'game_rank_category_id' => $categories['Platinum'],
                'tier'                  => 'II',
                'progress_target'       => null,
                'price'                 => 19000,
            ],
            [
                'game_rank_category_id' => $categories['Platinum'],
                'tier'                  => 'III',
                'progress_target'       => null,
                'price'                 => 20000,
            ],
            [
                'game_rank_category_id' => $categories['Platinum'],
                'tier'                  => 'IV',
                'progress_target'       => null,
                'price'                 => 21000,
            ],
            // Diamond
            [
                'game_rank_category_id' => $categories['Diamond'],
                'tier'                  => 'I',
                'progress_target'       => null,
                'price'                 => 22000,
            ],
            [
                'game_rank_category_id' => $categories['Diamond'],
                'tier'                  => 'II',
                'progress_target'       => null,
                'price'                 => 23000,
            ],
            [
                'game_rank_category_id' => $categories['Diamond'],
                'tier'                  => 'III',
                'progress_target'       => null,
                'price'                 => 24000,
            ],
            [
                'game_rank_category_id' => $categories['Diamond'],
                'tier'                  => 'IV',
                'progress_target'       => null,
                'price'                 => 25000,
            ],
        ];

        foreach ($tiers as $tier) {
            GameRankTier::create($tier);
        }
    }
}
