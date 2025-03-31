<?php

namespace Database\Seeders;

use App\Models\GameRankCategory;
use App\Models\GameRankTier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobileLegendGameRankTierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'warrior' => GameRankCategory::where('name', 'Warrior')->where('game_id', 2)->first()?->id,
            'elite'   => GameRankCategory::where('name', 'Elite')->where('game_id', 2)->first()?->id,
            'master'  => GameRankCategory::where('name', 'Master')->where('game_id', 2)->first()?->id,
            'gm'      => GameRankCategory::where('name', 'GM')->where('game_id', 2)->first()?->id,
            'epic'    => GameRankCategory::where('name', 'Epic')->where('game_id', 2)->first()?->id,
            'legend'  => GameRankCategory::where('name', 'Legend')->where('game_id', 2)->first()?->id,
        ];

        $tiers = [
            // Warrior
            [
                'game_rank_category_id' => $categories['warrior'],
                'tier'                  => 'III',
                'progress_target'       => 3,
                // 'price'                 => 1000,
            ],
            [
                'game_rank_category_id' => $categories['warrior'],
                'tier'                  => 'II',
                'progress_target'       => 3,
                // 'price'                 => 2000,
            ],
            [
                'game_rank_category_id' => $categories['warrior'],
                'tier'                  => 'I',
                'progress_target'       => 3,
                // 'price'                 => 3000,
            ],
            // Elite
            [
                'game_rank_category_id' => $categories['elite'],
                'tier'                  => 'III',
                'progress_target'       => 4,
                // 'price'                 => 4000,
            ],
            [
                'game_rank_category_id' => $categories['elite'],
                'tier'                  => 'II',
                'progress_target'       => 4,
                // 'price'                 => 5000,
            ],
            [
                'game_rank_category_id' => $categories['elite'],
                'tier'                  => 'I',
                'progress_target'       => 4,
                // 'price'                 => 6000,
            ],
            // Master
            [
                'game_rank_category_id' => $categories['master'],
                'tier'                  => 'IV',
                'progress_target'       => 4,
                // 'price'                 => 7000,
            ],
            [
                'game_rank_category_id' => $categories['master'],
                'tier'                  => 'III',
                'progress_target'       => 4,
                // 'price'                 => 8000,
            ],
            [
                'game_rank_category_id' => $categories['master'],
                'tier'                  => 'II',
                'progress_target'       => 4,
                // 'price'                 => 9000,
            ],
            [
                'game_rank_category_id' => $categories['master'],
                'tier'                  => 'I',
                'progress_target'       => 4,
                // 'price'                 => 10000,
            ],
            // GM
            [
                'game_rank_category_id' => $categories['gm'],
                'tier'                  => 'V',
                'progress_target'       => 5,
                // 'price'                 => 11000,
            ],
            [
                'game_rank_category_id' => $categories['gm'],
                'tier'                  => 'IV',
                'progress_target'       => 5,
                // 'price'                 => 12000,
            ],
            [
                'game_rank_category_id' => $categories['gm'],
                'tier'                  => 'III',
                'progress_target'       => 5,
                // 'price'                 => 13000,
            ],
            [
                'game_rank_category_id' => $categories['gm'],
                'tier'                  => 'II',
                'progress_target'       => 5,
                // 'price'                 => 14000,
            ],
            [
                'game_rank_category_id' => $categories['gm'],
                'tier'                  => 'I',
                'progress_target'       => 5,
                // 'price'                 => 15000,
            ],
            // Epic
            [
                'game_rank_category_id' => $categories['epic'],
                'tier'                  => 'V',
                'progress_target'       => 5,
                // 'price'                 => 16000,
            ],
            [
                'game_rank_category_id' => $categories['epic'],
                'tier'                  => 'IV',
                'progress_target'       => 5,
                // 'price'                 => 17000,
            ],
            [
                'game_rank_category_id' => $categories['epic'],
                'tier'                  => 'III',
                'progress_target'       => 5,
                // 'price'                 => 18000,
            ],
            [
                'game_rank_category_id' => $categories['epic'],
                'tier'                  => 'II',
                'progress_target'       => 5,
                // 'price'                 => 19000,
            ],
            [
                'game_rank_category_id' => $categories['epic'],
                'tier'                  => 'I',
                'progress_target'       => 5,
                // 'price'                 => 20000,
            ],
            // Legend
            [
                'game_rank_category_id' => $categories['legend'],
                'tier'                  => 'V',
                'progress_target'       => 5,
                // 'price'                 => 21000,
            ],
            [
                'game_rank_category_id' => $categories['legend'],
                'tier'                  => 'IV',
                'progress_target'       => 5,
                // 'price'                 => 22000,
            ],
            [
                'game_rank_category_id' => $categories['legend'],
                'tier'                  => 'III',
                'progress_target'       => 5,
                // 'price'                 => 23000,
            ],
            [
                'game_rank_category_id' => $categories['legend'],
                'tier'                  => 'II',
                'progress_target'       => 5,
                // 'price'                 => 24000,
            ],
            [
                'game_rank_category_id' => $categories['legend'],
                'tier'                  => 'I',
                'progress_target'       => 5,
                // 'price'                 => 25000,
            ],
        ];

        foreach ($tiers as $tier) {
            GameRankTier::create($tier);
        }
    }
}
