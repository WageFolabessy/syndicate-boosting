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
            'Rookie' => GameRankCategory::where('name', 'Rookie')->first()?->id,
            'Bronze'   => GameRankCategory::where('name', 'Bronze')->first()?->id,
            'Silver'  => GameRankCategory::where('name', 'Silver')->first()?->id,
            'Gold'      => GameRankCategory::where('name', 'Gold')->first()?->id,
            'Platinum'    => GameRankCategory::where('name', 'Platinum')->first()?->id,
            'Diamond'  => GameRankCategory::where('name', 'Diamond')->first()?->id,
        ];

        // Data yang akan diinsert ke tabel game_rank_tiers
        $tiers = [
            // Rookie
            [
                'game_rank_category_id' => $categories['Rookie'],
                'tier'                  => 'I',
                'price'                 => 2000,
            ],
            [
                'game_rank_category_id' => $categories['Rookie'],
                'tier'                  => 'II',
                'price'                 => 3000,
            ],
            [
                'game_rank_category_id' => $categories['Rookie'],
                'tier'                  => 'III',
                'price'                 => 5000,
            ],
            [
                'game_rank_category_id' => $categories['Rookie'],
                'tier'                  => 'IV',
                'price'                 => 5000,
            ],
            // Bronze
            [
                'game_rank_category_id' => $categories['Bronze'],
                'tier'                  => 'I',
                'price'                 => 6000,
            ],
            [
                'game_rank_category_id' => $categories['Bronze'],
                'tier'                  => 'II',
                'price'                 => 7000,
            ],
            [
                'game_rank_category_id' => $categories['Bronze'],
                'tier'                  => 'III',
                'price'                 => 8000,
            ],
            [
                'game_rank_category_id' => $categories['Bronze'],
                'tier'                  => 'IV',
                'price'                 => 9000,
            ],
            // Silver
            [
                'game_rank_category_id' => $categories['Silver'],
                'tier'                  => 'I',
                'price'                 => 10000,
            ],
            [
                'game_rank_category_id' => $categories['Silver'],
                'tier'                  => 'II',
                'price'                 => 11000,
            ],
            [
                'game_rank_category_id' => $categories['Silver'],
                'tier'                  => 'III',
                'price'                 => 12000,
            ],
            [
                'game_rank_category_id' => $categories['Silver'],
                'tier'                  => 'IV',
                'price'                 => 13000,
            ],
            // Gold
            [
                'game_rank_category_id' => $categories['Gold'],
                'tier'                  => 'I',
                'price'                 => 14000,
            ],
            [
                'game_rank_category_id' => $categories['Gold'],
                'tier'                  => 'II',
                'price'                 => 15000,
            ],
            [
                'game_rank_category_id' => $categories['Gold'],
                'tier'                  => 'III',
                'price'                 => 16000,
            ],
            [
                'game_rank_category_id' => $categories['Gold'],
                'tier'                  => 'IV',
                'price'                 => 17000,
            ],
            // Platinum
            [
                'game_rank_category_id' => $categories['Platinum'],
                'tier'                  => 'I',
                'price'                 => 18000,
            ],
            [
                'game_rank_category_id' => $categories['Platinum'],
                'tier'                  => 'II',
                'price'                 => 19000,
            ],
            [
                'game_rank_category_id' => $categories['Platinum'],
                'tier'                  => 'III',
                'price'                 => 20000,
            ],
            [
                'game_rank_category_id' => $categories['Platinum'],
                'tier'                  => 'IV',
                'price'                 => 21000,
            ],
            // Diamond
            [
                'game_rank_category_id' => $categories['Diamond'],
                'tier'                  => 'I',
                'price'                 => 22000,
            ],
            [
                'game_rank_category_id' => $categories['Diamond'],
                'tier'                  => 'II',
                'price'                 => 23000,
            ],
            [
                'game_rank_category_id' => $categories['Diamond'],
                'tier'                  => 'III',
                'price'                 => 24000,
            ],
            [
                'game_rank_category_id' => $categories['Diamond'],
                'tier'                  => 'IV',
                'price'                 => 25000,
            ],
        ];

        // Looping dan create setiap record
        foreach ($tiers as $tier) {
            GameRankTier::create($tier);
        }
    }
}
