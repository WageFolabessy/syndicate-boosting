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


        // Debug untuk memastikan semua kategori terisi
        // dd($categories);

        // Data tier untuk masing-masing kategori
        $tiers = [
            // Warrior
            [
                'game_rank_category_id' => $categories['warrior'],
                'tier' => 'I',
                'stars_required' => 3,
                'price' => 2000,
            ],
            [
                'game_rank_category_id' => $categories['warrior'],
                'tier' => 'II',
                'stars_required' => 3,
                'price' => 3000,
            ],
            [
                'game_rank_category_id' => $categories['warrior'],
                'tier' => 'III',
                'stars_required' => 3,
                'price' => 5000,
            ],
            // Elite
            [
                'game_rank_category_id' => $categories['elite'],
                'tier' => 'I',
                'stars_required' => 3,
                'price' => 6000,
            ],
            [
                'game_rank_category_id' => $categories['elite'],
                'tier' => 'II',
                'stars_required' => 3,
                'price' => 7000,
            ],
            [
                'game_rank_category_id' => $categories['elite'],
                'tier' => 'III',
                'stars_required' => 3,
                'price' => 8000,
            ],
            [
                'game_rank_category_id' => $categories['elite'],
                'tier' => 'IV',
                'stars_required' => 3,
                'price' => 9000,
            ],
            // Master
            [
                'game_rank_category_id' => $categories['master'],
                'tier' => 'I',
                'stars_required' => 4,
                'price' => 10000,
            ],
            [
                'game_rank_category_id' => $categories['master'],
                'tier' => 'II',
                'stars_required' => 4,
                'price' => 11000,
            ],
            [
                'game_rank_category_id' => $categories['master'],
                'tier' => 'III',
                'stars_required' => 4,
                'price' => 12000,
            ],
            [
                'game_rank_category_id' => $categories['master'],
                'tier' => 'IV',
                'stars_required' => 4,
                'price' => 13000,
            ],
            // GM
            [
                'game_rank_category_id' => $categories['gm'],
                'tier' => 'I',
                'stars_required' => 4,
                'price' => 14000,
            ],
            [
                'game_rank_category_id' => $categories['gm'],
                'tier' => 'II',
                'stars_required' => 4,
                'price' => 15000,
            ],
            [
                'game_rank_category_id' => $categories['gm'],
                'tier' => 'III',
                'stars_required' => 4,
                'price' => 16000,
            ],
            [
                'game_rank_category_id' => $categories['gm'],
                'tier' => 'IV',
                'stars_required' => 4,
                'price' => 17000,
            ],
            // Epic
            [
                'game_rank_category_id' => $categories['epic'],
                'tier' => 'I',
                'stars_required' => 5,
                'price' => 18000,
            ],
            [
                'game_rank_category_id' => $categories['epic'],
                'tier' => 'II',
                'stars_required' => 5,
                'price' => 19000,
            ],
            [
                'game_rank_category_id' => $categories['epic'],
                'tier' => 'III',
                'stars_required' => 5,
                'price' => 20000,
            ],
            [
                'game_rank_category_id' => $categories['epic'],
                'tier' => 'IV',
                'stars_required' => 5,
                'price' => 21000,
            ],
            // Legend
            [
                'game_rank_category_id' => $categories['legend'],
                'tier' => 'I',
                'stars_required' => 5,
                'price' => 22000,
            ],
            [
                'game_rank_category_id' => $categories['legend'],
                'tier' => 'II',
                'stars_required' => 5,
                'price' => 23000,
            ],
            [
                'game_rank_category_id' => $categories['legend'],
                'tier' => 'III',
                'stars_required' => 5,
                'price' => 24000,
            ],
            [
                'game_rank_category_id' => $categories['legend'],
                'tier' => 'IV',
                'stars_required' => 5,
                'price' => 25000,
            ],
        ];

        foreach ($tiers as $tier) {
            GameRankTier::create($tier);
        }
    }
}
