<?php

namespace Database\Seeders;

use App\Models\GameRankTier;
use App\Models\GameRankTierDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobileLegendGameRankTierDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rankTier = [
            'warrior3' => GameRankTier::where('tier', 'III')->where('game_rank_category_id', 7)->first()?->id,
            'warrior2' => GameRankTier::where('tier', 'II')->where('game_rank_category_id', 7)->first()?->id,
            'warrior1' => GameRankTier::where('tier', 'I')->where('game_rank_category_id', 7)->first()?->id,
            'elite3' => GameRankTier::where('tier', 'III')->where('game_rank_category_id', 8)->first()?->id,
            'elite2' => GameRankTier::where('tier', 'II')->where('game_rank_category_id', 8)->first()?->id,
            'elite1' => GameRankTier::where('tier', 'I')->where('game_rank_category_id', 8)->first()?->id,
            'master4' => GameRankTier::where('tier', 'IV')->where('game_rank_category_id', 9)->first()?->id,
            'master3' => GameRankTier::where('tier', 'III')->where('game_rank_category_id', 9)->first()?->id,
            'master2' => GameRankTier::where('tier', 'II')->where('game_rank_category_id', 9)->first()?->id,
            'master1' => GameRankTier::where('tier', 'I')->where('game_rank_category_id', 9)->first()?->id,
            'gm5' => GameRankTier::where('tier', 'V')->where('game_rank_category_id', 10)->first()?->id,
            'gm4' => GameRankTier::where('tier', 'IV')->where('game_rank_category_id', 10)->first()?->id,
            'gm3' => GameRankTier::where('tier', 'III')->where('game_rank_category_id', 10)->first()?->id,
            'gm2' => GameRankTier::where('tier', 'II')->where('game_rank_category_id', 10)->first()?->id,
            'gm1' => GameRankTier::where('tier', 'I')->where('game_rank_category_id', 10)->first()?->id,
            'epic5' => GameRankTier::where('tier', 'V')->where('game_rank_category_id', 11)->first()?->id,
            'epic4' => GameRankTier::where('tier', 'IV')->where('game_rank_category_id', 11)->first()?->id,
            'epic3' => GameRankTier::where('tier', 'III')->where('game_rank_category_id', 11)->first()?->id,
            'epic2' => GameRankTier::where('tier', 'II')->where('game_rank_category_id', 11)->first()?->id,
            'epic1' => GameRankTier::where('tier', 'I')->where('game_rank_category_id', 11)->first()?->id,
            'legend5' => GameRankTier::where('tier', 'V')->where('game_rank_category_id', 12)->first()?->id,
            'legend4' => GameRankTier::where('tier', 'IV')->where('game_rank_category_id', 12)->first()?->id,
            'legend3' => GameRankTier::where('tier', 'III')->where('game_rank_category_id', 12)->first()?->id,
            'legend2' => GameRankTier::where('tier', 'II')->where('game_rank_category_id', 12)->first()?->id,
            'legend1' => GameRankTier::where('tier', 'I')->where('game_rank_category_id', 12)->first()?->id,
        ];

        $tierDetails = [
            // Warrior 3
            [
                'game_rank_tier_id' => $rankTier['warrior3'],
                'star_number' => '0',
                'price' => 0,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['warrior3'],
                'star_number' => '1',
                'price' => 1000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['warrior3'],
                'star_number' => '2',
                'price' => 2000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['warrior3'],
                'star_number' => '3',
                'price' => 3000,
                'display_order' => 3,
            ],
            // Warrior 2
            [
                'game_rank_tier_id' => $rankTier['warrior2'],
                'star_number' => '0',
                'price' => 3500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['warrior2'],
                'star_number' => '1',
                'price' => 4000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['warrior2'],
                'star_number' => '2',
                'price' => 5000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['warrior2'],
                'star_number' => '3',
                'price' => 6000,
                'display_order' => 3,
            ],
            // Warrior 1
            [
                'game_rank_tier_id' => $rankTier['warrior1'],
                'star_number' => '0',
                'price' => 6500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['warrior1'],
                'star_number' => '1',
                'price' => 7000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['warrior1'],
                'star_number' => '2',
                'price' => 8000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['warrior1'],
                'star_number' => '3',
                'price' => 9000,
                'display_order' => 3,
            ],
            // Elite 3
            [
                'game_rank_tier_id' => $rankTier['elite3'],
                'star_number' => '0',
                'price' => 9500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['elite3'],
                'star_number' => '1',
                'price' => 10000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['elite3'],
                'star_number' => '2',
                'price' => 11000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['elite3'],
                'star_number' => '3',
                'price' => 12000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['elite3'],
                'star_number' => '4',
                'price' => 13000,
                'display_order' => 4,
            ],
            // Elite 2
            [
                'game_rank_tier_id' => $rankTier['elite2'],
                'star_number' => '0',
                'price' => 13500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['elite2'],
                'star_number' => '1',
                'price' => 14000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['elite2'],
                'star_number' => '2',
                'price' => 15000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['elite2'],
                'star_number' => '3',
                'price' => 16000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['elite2'],
                'star_number' => '4',
                'price' => 17000,
                'display_order' => 4,
            ],
            // Elite 1
            [
                'game_rank_tier_id' => $rankTier['elite1'],
                'star_number' => '0',
                'price' => 17500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['elite1'],
                'star_number' => '1',
                'price' => 18000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['elite1'],
                'star_number' => '2',
                'price' => 19000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['elite1'],
                'star_number' => '3',
                'price' => 20000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['elite1'],
                'star_number' => '4',
                'price' => 21000,
                'display_order' => 4,
            ],
            // Master 4
            [
                'game_rank_tier_id' => $rankTier['master4'],
                'star_number' => '0',
                'price' => 21500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['master4'],
                'star_number' => '1',
                'price' => 22000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['master4'],
                'star_number' => '2',
                'price' => 23000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['master4'],
                'star_number' => '3',
                'price' => 24000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['master4'],
                'star_number' => '4',
                'price' => 25000,
                'display_order' => 4,
            ],
            // Master 3
            [
                'game_rank_tier_id' => $rankTier['master3'],
                'star_number' => '0',
                'price' => 25500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['master3'],
                'star_number' => '1',
                'price' => 26000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['master3'],
                'star_number' => '2',
                'price' => 27000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['master3'],
                'star_number' => '3',
                'price' => 28000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['master3'],
                'star_number' => '4',
                'price' => 29000,
                'display_order' => 4,
            ],
            // Master 2
            [
                'game_rank_tier_id' => $rankTier['master2'],
                'star_number' => '0',
                'price' => 30500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['master2'],
                'star_number' => '1',
                'price' => 30000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['master2'],
                'star_number' => '2',
                'price' => 31000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['master2'],
                'star_number' => '3',
                'price' => 32000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['master2'],
                'star_number' => '4',
                'price' => 33000,
                'display_order' => 4,
            ],
            // Master 1
            [
                'game_rank_tier_id' => $rankTier['master1'],
                'star_number' => '0',
                'price' => 33500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['master1'],
                'star_number' => '1',
                'price' => 34000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['master1'],
                'star_number' => '2',
                'price' => 35000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['master1'],
                'star_number' => '3',
                'price' => 36000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['master1'],
                'star_number' => '4',
                'price' => 37000,
                'display_order' => 4,
            ],
            // GM 5
            [
                'game_rank_tier_id' => $rankTier['gm5'],
                'star_number' => '0',
                'price' => 37500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm5'],
                'star_number' => '1',
                'price' => 38000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm5'],
                'star_number' => '2',
                'price' => 39000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm5'],
                'star_number' => '3',
                'price' => 40000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm5'],
                'star_number' => '4',
                'price' => 41000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm5'],
                'star_number' => '5',
                'price' => 42000,
                'display_order' => 5,
            ],
            // GM 4
            [
                'game_rank_tier_id' => $rankTier['gm4'],
                'star_number' => '0',
                'price' => 42500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm4'],
                'star_number' => '1',
                'price' => 42000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm4'],
                'star_number' => '2',
                'price' => 43000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm4'],
                'star_number' => '3',
                'price' => 44000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm4'],
                'star_number' => '4',
                'price' => 45000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm4'],
                'star_number' => '5',
                'price' => 46000,
                'display_order' => 5,
            ],
            // GM 3
            [
                'game_rank_tier_id' => $rankTier['gm3'],
                'star_number' => '0',
                'price' => 46500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm3'],
                'star_number' => '1',
                'price' => 47000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm3'],
                'star_number' => '2',
                'price' => 48000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm3'],
                'star_number' => '3',
                'price' => 49000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm3'],
                'star_number' => '4',
                'price' => 50000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm3'],
                'star_number' => '5',
                'price' => 51000,
                'display_order' => 5,
            ],
            // GM 2
            [
                'game_rank_tier_id' => $rankTier['gm2'],
                'star_number' => '0',
                'price' => 51500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm2'],
                'star_number' => '1',
                'price' => 52000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm2'],
                'star_number' => '2',
                'price' => 53000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm2'],
                'star_number' => '3',
                'price' => 54000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm2'],
                'star_number' => '4',
                'price' => 55000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm2'],
                'star_number' => '5',
                'price' => 56000,
                'display_order' => 5,
            ],
            // GM 1
            [
                'game_rank_tier_id' => $rankTier['gm1'],
                'star_number' => '0',
                'price' => 56500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm1'],
                'star_number' => '1',
                'price' => 57000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm1'],
                'star_number' => '2',
                'price' => 58000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm1'],
                'star_number' => '3',
                'price' => 59000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm1'],
                'star_number' => '4',
                'price' => 60000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['gm1'],
                'star_number' => '5',
                'price' => 61000,
                'display_order' => 5,
            ],
            // Epic 5
            [
                'game_rank_tier_id' => $rankTier['epic5'],
                'star_number' => '0',
                'price' => 61500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic5'],
                'star_number' => '1',
                'price' => 62000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic5'],
                'star_number' => '2',
                'price' => 63000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic5'],
                'star_number' => '3',
                'price' => 64000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic5'],
                'star_number' => '4',
                'price' => 65000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic5'],
                'star_number' => '5',
                'price' => 66000,
                'display_order' => 5,
            ],
            // Epic 4
            [
                'game_rank_tier_id' => $rankTier['epic4'],
                'star_number' => '0',
                'price' => 66500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic4'],
                'star_number' => '1',
                'price' => 67000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic4'],
                'star_number' => '2',
                'price' => 68000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic4'],
                'star_number' => '3',
                'price' => 69000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic4'],
                'star_number' => '4',
                'price' => 70000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic4'],
                'star_number' => '5',
                'price' => 71000,
                'display_order' => 5,
            ],
            // Epic 3
            [
                'game_rank_tier_id' => $rankTier['epic3'],
                'star_number' => '0',
                'price' => 71500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic3'],
                'star_number' => '1',
                'price' => 72000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic3'],
                'star_number' => '2',
                'price' => 73000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic3'],
                'star_number' => '3',
                'price' => 74000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic3'],
                'star_number' => '4',
                'price' => 75000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic3'],
                'star_number' => '5',
                'price' => 76000,
                'display_order' => 5,
            ],
            // Epic 2
            [
                'game_rank_tier_id' => $rankTier['epic2'],
                'star_number' => '0',
                'price' => 76500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic2'],
                'star_number' => '1',
                'price' => 77000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic2'],
                'star_number' => '2',
                'price' => 78000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic2'],
                'star_number' => '3',
                'price' => 79000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic2'],
                'star_number' => '4',
                'price' => 80000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic2'],
                'star_number' => '5',
                'price' => 81000,
                'display_order' => 5,
            ],
            // Epic 1
            [
                'game_rank_tier_id' => $rankTier['epic1'],
                'star_number' => '0',
                'price' => 81500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic1'],
                'star_number' => '1',
                'price' => 82000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic1'],
                'star_number' => '2',
                'price' => 83000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic1'],
                'star_number' => '3',
                'price' => 84000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic1'],
                'star_number' => '4',
                'price' => 85000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['epic1'],
                'star_number' => '5',
                'price' => 86000,
                'display_order' => 5,
            ],
            // Legend 5
            [
                'game_rank_tier_id' => $rankTier['legend5'],
                'star_number' => '0',
                'price' => 86500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend5'],
                'star_number' => '1',
                'price' => 87000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend5'],
                'star_number' => '2',
                'price' => 88000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend5'],
                'star_number' => '3',
                'price' => 89000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend5'],
                'star_number' => '4',
                'price' => 90000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend5'],
                'star_number' => '5',
                'price' => 91000,
                'display_order' => 5,
            ],
            // Legend 4
            [
                'game_rank_tier_id' => $rankTier['legend4'],
                'star_number' => '0',
                'price' => 91500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend4'],
                'star_number' => '1',
                'price' => 92000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend4'],
                'star_number' => '2',
                'price' => 93000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend4'],
                'star_number' => '3',
                'price' => 94000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend4'],
                'star_number' => '4',
                'price' => 95000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend4'],
                'star_number' => '5',
                'price' => 96000,
                'display_order' => 5,
            ],
            // Legend 3
            [
                'game_rank_tier_id' => $rankTier['legend3'],
                'star_number' => '0',
                'price' => 96500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend3'],
                'star_number' => '1',
                'price' => 97000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend3'],
                'star_number' => '2',
                'price' => 98000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend3'],
                'star_number' => '3',
                'price' => 99000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend3'],
                'star_number' => '4',
                'price' => 100000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend3'],
                'star_number' => '5',
                'price' => 101000,
                'display_order' => 5,
            ],
            // Legend 2
            [
                'game_rank_tier_id' => $rankTier['legend2'],
                'star_number' => '0',
                'price' => 101500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend2'],
                'star_number' => '1',
                'price' => 102000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend2'],
                'star_number' => '2',
                'price' => 103000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend2'],
                'star_number' => '3',
                'price' => 104000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend2'],
                'star_number' => '4',
                'price' => 105000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend2'],
                'star_number' => '5',
                'price' => 106000,
                'display_order' => 5,
            ],
            // Legend 1
            [
                'game_rank_tier_id' => $rankTier['legend1'],
                'star_number' => '0',
                'price' => 106500,
                'display_order' => 0,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend1'],
                'star_number' => '1',
                'price' => 107000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend1'],
                'star_number' => '2',
                'price' => 108000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend1'],
                'star_number' => '3',
                'price' => 109000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend1'],
                'star_number' => '4',
                'price' => 110000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['legend1'],
                'star_number' => '5',
                'price' => 111000,
                'display_order' => 5,
            ],
        ];

        foreach ($tierDetails as $tierDetaild) {
            GameRankTierDetail::create($tierDetaild);
        }
    }
}
