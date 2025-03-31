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
        // Misalnya, untuk setiap tier dalam kategori Warrior, kita tambahkan detail sesuai dengan progress_target (contoh: 3 bintang)
        $tiers = GameRankTier::whereHas('rankCategory', function ($query) {
            $query->where('name', 'Warrior')->where('game_id', 2);
        })->get();

        foreach ($tiers as $tier) {
            for ($i = 1; $i <= $tier->progress_target; $i++) {
                GameRankTierDetail::create([
                    'game_rank_tier_id' => $tier->id,
                    'star_number'       => $i,
                    'price'             => $tier->price,
                    'display_order'     => $i,
                ]);
            }
        }
    }
}
