<?php

namespace Database\Seeders;

use App\Models\GameRankTier;
use App\Models\GameRankTierDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApexLegendGameRankTierDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rankTier = [
            'rookie4' => GameRankTier::where('tier', 'IV')->where('game_rank_category_id', 1)->first()?->id,
            'rookie3' => GameRankTier::where('tier', 'III')->where('game_rank_category_id', 1)->first()?->id,
            'rookie2' => GameRankTier::where('tier', 'II')->where('game_rank_category_id', 1)->first()?->id,
            'rookie1' => GameRankTier::where('tier', 'I')->where('game_rank_category_id', 1)->first()?->id,
            'bronze4' => GameRankTier::where('tier', 'IV')->where('game_rank_category_id', 2)->first()?->id,
            'bronze3' => GameRankTier::where('tier', 'III')->where('game_rank_category_id', 2)->first()?->id,
            'bronze2' => GameRankTier::where('tier', 'II')->where('game_rank_category_id', 2)->first()?->id,
            'bronze1' => GameRankTier::where('tier', 'I')->where('game_rank_category_id', 2)->first()?->id,
            'silver4' => GameRankTier::where('tier', 'IV')->where('game_rank_category_id', 3)->first()?->id,
            'silver3' => GameRankTier::where('tier', 'III')->where('game_rank_category_id', 3)->first()?->id,
            'silver2' => GameRankTier::where('tier', 'II')->where('game_rank_category_id', 3)->first()?->id,
            'silver1' => GameRankTier::where('tier', 'I')->where('game_rank_category_id', 3)->first()?->id,
            'gold4' => GameRankTier::where('tier', 'IV')->where('game_rank_category_id', 4)->first()?->id,
            'gold3' => GameRankTier::where('tier', 'III')->where('game_rank_category_id', 4)->first()?->id,
            'gold2' => GameRankTier::where('tier', 'II')->where('game_rank_category_id', 4)->first()?->id,
            'gold1' => GameRankTier::where('tier', 'I')->where('game_rank_category_id', 4)->first()?->id,
            'platinum4' => GameRankTier::where('tier', 'IV')->where('game_rank_category_id', 5)->first()?->id,
            'platinum3' => GameRankTier::where('tier', 'III')->where('game_rank_category_id', 5)->first()?->id,
            'platinum2' => GameRankTier::where('tier', 'II')->where('game_rank_category_id', 5)->first()?->id,
            'platinum1' => GameRankTier::where('tier', 'I')->where('game_rank_category_id', 5)->first()?->id,
            'diamond4' => GameRankTier::where('tier', 'IV')->where('game_rank_category_id', 6)->first()?->id,
            'diamond3' => GameRankTier::where('tier', 'III')->where('game_rank_category_id', 6)->first()?->id,
            'diamond2' => GameRankTier::where('tier', 'II')->where('game_rank_category_id', 6)->first()?->id,
            'diamond1' => GameRankTier::where('tier', 'I')->where('game_rank_category_id', 6)->first()?->id,
        ];

        $tierDetails = [
            // Rookie 4
            [
                'game_rank_tier_id' => $rankTier['rookie4'],
                'star_number' => '0-50 RP',
                'price' => 1000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie4'],
                'star_number' => '51-100 RP',
                'price' => 2000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie4'],
                'star_number' => '101-150 RP',
                'price' => 3000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie4'],
                'star_number' => '151-200 RP',
                'price' => 4000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie4'],
                'star_number' => '201-250 RP',
                'price' => 5000,
                'display_order' => 5,
            ],
            // Rookie 3
            [
                'game_rank_tier_id' => $rankTier['rookie3'],
                'star_number' => '250-300 RP',
                'price' => 6000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie3'],
                'star_number' => '301-350 RP',
                'price' => 7000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie3'],
                'star_number' => '351-400 RP',
                'price' => 8000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie3'],
                'star_number' => '401-450 RP',
                'price' => 9000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie3'],
                'star_number' => '451-500 RP',
                'price' => 10000,
                'display_order' => 5,
            ],
            // Rookie 2
            [
                'game_rank_tier_id' => $rankTier['rookie2'],
                'star_number' => '500-550 RP',
                'price' => 11000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie2'],
                'star_number' => '551-600 RP',
                'price' => 12000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie2'],
                'star_number' => '601-650 RP',
                'price' => 13000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie2'],
                'star_number' => '651-700 RP',
                'price' => 14000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie2'],
                'star_number' => '701-750 RP',
                'price' =>15000,
                'display_order' => 5,
            ],
            // Rookie 1
            [
                'game_rank_tier_id' => $rankTier['rookie1'],
                'star_number' => '750-800 RP',
                'price' => 16000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie1'],
                'star_number' => '801-850 RP',
                'price' => 17000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie1'],
                'star_number' => '851-900 RP',
                'price' => 18000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie1'],
                'star_number' => '901-950 RP',
                'price' => 19000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['rookie1'],
                'star_number' => '951-1000 RP',
                'price' =>20000,
                'display_order' => 5,
            ],
            // Bronze 4
            [
                'game_rank_tier_id' => $rankTier['bronze4'],
                'star_number' => '1001-1100 RP',
                'price' => 21000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze4'],
                'star_number' => '1101-1200 RP',
                'price' => 22000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze4'],
                'star_number' => '1201-1300 RP',
                'price' => 23000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze4'],
                'star_number' => '1301-1400 RP',
                'price' => 24000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze4'],
                'star_number' => '1401-1500 RP',
                'price' =>25000,
                'display_order' => 5,
            ],
            // Bronze 3
            [
                'game_rank_tier_id' => $rankTier['bronze3'],
                'star_number' => '1500-1600 RP',
                'price' => 21000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze3'],
                'star_number' => '1601-1700 RP',
                'price' => 22000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze3'],
                'star_number' => '1701-1800 RP',
                'price' => 23000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze3'],
                'star_number' => '1801-1900 RP',
                'price' => 24000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze3'],
                'star_number' => '1901-2000 RP',
                'price' =>25000,
                'display_order' => 5,
            ],
            // Bronze 2
            [
                'game_rank_tier_id' => $rankTier['bronze2'],
                'star_number' => '2000-2100 RP',
                'price' => 26000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze2'],
                'star_number' => '2101-2200 RP',
                'price' => 27000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze2'],
                'star_number' => '2201-2300 RP',
                'price' => 28000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze2'],
                'star_number' => '2301-2400 RP',
                'price' => 29000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze2'],
                'star_number' => '2401-2500 RP',
                'price' =>30000,
                'display_order' => 5,
            ],
            // Bronze 1
            [
                'game_rank_tier_id' => $rankTier['bronze1'],
                'star_number' => '2500-2600 RP',
                'price' => 26000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze1'],
                'star_number' => '2601-2700 RP',
                'price' => 27000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze1'],
                'star_number' => '2701-2800 RP',
                'price' => 28000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze1'],
                'star_number' => '2801-2900 RP',
                'price' => 29000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['bronze1'],
                'star_number' => '2901-3000 RP',
                'price' =>30000,
                'display_order' => 5,
            ],
            // Silver 4
            [
                'game_rank_tier_id' => $rankTier['silver4'],
                'star_number' => '3000-3120 RP',
                'price' => 31000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver4'],
                'star_number' => '3121-3240 RP',
                'price' => 32000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver4'],
                'star_number' => '3241-3360 RP',
                'price' => 33000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver4'],
                'star_number' => '3361-3480 RP',
                'price' => 34000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver4'],
                'star_number' => '3481-3600 RP',
                'price' =>35000,
                'display_order' => 5,
            ],
            // Silver 3
            [
                'game_rank_tier_id' => $rankTier['silver3'],
                'star_number' => '3601-3720 RP',
                'price' => 36000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver3'],
                'star_number' => '3721-3840 RP',
                'price' => 37000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver3'],
                'star_number' => '3841-3960 RP',
                'price' => 38000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver3'],
                'star_number' => '3961-4080 RP',
                'price' => 39000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver3'],
                'star_number' => '4081-4200 RP',
                'price' =>40000,
                'display_order' => 5,
            ],
            // Silver 2
            [
                'game_rank_tier_id' => $rankTier['silver2'],
                'star_number' => '4200-4320 RP',
                'price' => 41000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver2'],
                'star_number' => '4321-4440 RP',
                'price' => 42000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver2'],
                'star_number' => '4441-4560 RP',
                'price' => 43000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver2'],
                'star_number' => '4561-4680 RP',
                'price' => 44000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver2'],
                'star_number' => '4681-4800 RP',
                'price' =>45000,
                'display_order' => 5,
            ],
            // Silver 1
            [
                'game_rank_tier_id' => $rankTier['silver1'],
                'star_number' => '4800-4920 RP',
                'price' => 41000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver1'],
                'star_number' => '4921-5040 RP',
                'price' => 42000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver1'],
                'star_number' => '5041-5160 RP',
                'price' => 43000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver1'],
                'star_number' => '5161-5280 RP',
                'price' => 44000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['silver1'],
                'star_number' => '5281-5400 RP',
                'price' =>45000,
                'display_order' => 5,
            ],
            // Gold 4
            [
                'game_rank_tier_id' => $rankTier['gold4'],
                'star_number' => '5400-5540 RP',
                'price' => 46000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold4'],
                'star_number' => '5541-5680 RP',
                'price' => 47000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold4'],
                'star_number' => '5681-5820 RP',
                'price' => 48000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold4'],
                'star_number' => '5821-5960 RP',
                'price' => 49000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold4'],
                'star_number' => '5961-6100 RP',
                'price' =>50000,
                'display_order' => 5,
            ],
            // Gold 3
            [
                'game_rank_tier_id' => $rankTier['gold3'],
                'star_number' => '6100-6240 RP',
                'price' => 51000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold3'],
                'star_number' => '6241-6380 RP',
                'price' => 52000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold3'],
                'star_number' => '6381-6520 RP',
                'price' => 53000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold3'],
                'star_number' => '6521-6660 RP',
                'price' => 54000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold3'],
                'star_number' => '6661-6800 RP',
                'price' => 55000,
                'display_order' => 5,
            ],
            // Gold 2
            [
                'game_rank_tier_id' => $rankTier['gold2'],
                'star_number' => '6800-6940 RP',
                'price' => 56000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold2'],
                'star_number' => '6941-7080 RP',
                'price' => 57000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold2'],
                'star_number' => '7081-7220 RP',
                'price' => 58000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold2'],
                'star_number' => '7221-7360 RP',
                'price' => 59000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold2'],
                'star_number' => '7361-7500 RP',
                'price' => 60000,
                'display_order' => 5,
            ],
            // Gold 1
            [
                'game_rank_tier_id' => $rankTier['gold1'],
                'star_number' => '7500-7640 RP',
                'price' => 61000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold1'],
                'star_number' => '7641-7780 RP',
                'price' => 62000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold1'],
                'star_number' => '7781-7920 RP',
                'price' => 63000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold1'],
                'star_number' => '7921-8060 RP',
                'price' => 64000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['gold1'],
                'star_number' => '8061-8200 RP',
                'price' => 65000,
                'display_order' => 5,
            ],
            // Platinum 4
            [
                'game_rank_tier_id' => $rankTier['platinum4'],
                'star_number' => '8200-8340 RP',
                'price' => 66000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum4'],
                'star_number' => '8341-8580 RP',
                'price' => 67000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum4'],
                'star_number' => '8581-8680 RP',
                'price' => 68000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum4'],
                'star_number' => '8681-8840 RP',
                'price' => 69000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum4'],
                'star_number' => '8841-9000 RP',
                'price' => 70000,
                'display_order' => 5,
            ],
            // Platinum 3
            [
                'game_rank_tier_id' => $rankTier['platinum3'],
                'star_number' => '9000-9160 RP',
                'price' => 72000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum3'],
                'star_number' => '9161-9320 RP',
                'price' => 73000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum3'],
                'star_number' => '8321-9480 RP',
                'price' => 74000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum3'],
                'star_number' => '9481-9640 RP',
                'price' => 75000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum3'],
                'star_number' => '9641-9800 RP',
                'price' => 76000,
                'display_order' => 5,
            ],
            // Platinum 2
            [
                'game_rank_tier_id' => $rankTier['platinum2'],
                'star_number' => '9800-9960 RP',
                'price' => 77000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum2'],
                'star_number' => '9961-10120 RP',
                'price' => 78000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum2'],
                'star_number' => '10121-10280 RP',
                'price' => 79000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum2'],
                'star_number' => '10281-10440 RP',
                'price' => 81000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum2'],
                'star_number' => '1041-10600 RP',
                'price' => 82000,
                'display_order' => 5,
            ],
            // Platinum 1
            [
                'game_rank_tier_id' => $rankTier['platinum1'],
                'star_number' => '10600-10760 RP',
                'price' => 83000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum1'],
                'star_number' => '10761-10920 RP',
                'price' => 84000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum1'],
                'star_number' => '10921-11080 RP',
                'price' => 85000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum1'],
                'star_number' => '11081-11240 RP',
                'price' => 86000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['platinum1'],
                'star_number' => '11241-11400 RP',
                'price' => 87000,
                'display_order' => 5,
            ],
            // Diamond 4
            [
                'game_rank_tier_id' => $rankTier['diamond4'],
                'star_number' => '11401-11580 RP',
                'price' => 88000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond4'],
                'star_number' => '11581-11760 RP',
                'price' => 89000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond4'],
                'star_number' => '11761-11940 RP',
                'price' => 90000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond4'],
                'star_number' => '11941-12120 RP',
                'price' => 91000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond4'],
                'star_number' => '12121-12300 RP',
                'price' => 92000,
                'display_order' => 5,
            ],
            // Diamond 3
            [
                'game_rank_tier_id' => $rankTier['diamond3'],
                'star_number' => '12300-12480 RP',
                'price' => 93000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond3'],
                'star_number' => '12481-12660 RP',
                'price' => 94000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond3'],
                'star_number' => '12661-12840 RP',
                'price' => 95000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond3'],
                'star_number' => '12841-13020 RP',
                'price' => 96000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond3'],
                'star_number' => '13021-13200 RP',
                'price' => 97000,
                'display_order' => 5,
            ],
            // Diamond 2
            [
                'game_rank_tier_id' => $rankTier['diamond2'],
                'star_number' => '13200-13380 RP',
                'price' => 98000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond2'],
                'star_number' => '13381-13560 RP',
                'price' => 99000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond2'],
                'star_number' => '13561-13740 RP',
                'price' => 100000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond2'],
                'star_number' => '13741-13920 RP',
                'price' => 101000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond2'],
                'star_number' => '13921-14100 RP',
                'price' => 102000,
                'display_order' => 5,
            ],
            // Diamond 1
            [
                'game_rank_tier_id' => $rankTier['diamond1'],
                'star_number' => '14100-14280 RP',
                'price' => 103000,
                'display_order' => 1,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond1'],
                'star_number' => '14281-14460 RP',
                'price' => 104000,
                'display_order' => 2,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond1'],
                'star_number' => '14461-14640 RP',
                'price' => 105000,
                'display_order' => 3,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond1'],
                'star_number' => '14641-14820 RP',
                'price' => 106000,
                'display_order' => 4,
            ],
            [
                'game_rank_tier_id' => $rankTier['diamond1'],
                'star_number' => '14821-15000 RP',
                'price' => 107000,
                'display_order' => 5,
            ],
        ];

        foreach ($tierDetails as $tierDetaild) {
            GameRankTierDetail::create($tierDetaild);
        }
    }
}
