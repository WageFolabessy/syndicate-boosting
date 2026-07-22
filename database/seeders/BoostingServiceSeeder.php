<?php

namespace Database\Seeders;

use App\Models\BoostingService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BoostingServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mobileLegendImagePath = public_path('images/games/ml.jpg');
        $pointBlankImagePath = public_path('images/games/pb.jpeg');

        // Helper closure to upload image and create boosting service
        $createService = function (array $data, ?string $sourceImagePath) {
            if ($sourceImagePath && file_exists($sourceImagePath)) {
                $ext = pathinfo($sourceImagePath, PATHINFO_EXTENSION);
                $fileName = 'boosting-services/'.Str::random(20).'.'.$ext;
                Storage::disk('public')->put($fileName, file_get_contents($sourceImagePath));
                $data['image'] = $fileName;
            } else {
                $data['image'] = null;
            }

            return BoostingService::create($data);
        };

        // --- Point Blank (Game ID: 3) ---
        $createService([
            'game_id' => 3,
            'title' => '1 Juta Exp Char Bundir',
            'description' => '',
            'original_price' => 15000,
            'sale_price' => null,
        ], $pointBlankImagePath);

        $createService([
            'game_id' => 3,
            'title' => 'JASA ABSEN 1 April - 28 April 2025',
            'description' => '',
            'original_price' => 2500,
            'sale_price' => null,
        ], $pointBlankImagePath);

        $createService([
            'game_id' => 3,
            'title' => 'JASA ABSEN 7 Juli 2026 - 3 Agustus 2026 ( WAJIB SUDAH VERIF EMAIL, datapolos tidak bisa order )',
            'description' => null,
            'original_price' => 2500,
            'sale_price' => null,
        ], $pointBlankImagePath);

        $createService([
            'game_id' => 3,
            'title' => 'GB BATTLEPASS LEVEL 45 Season 22, belum termasuk item battlepass premium ( WAJIB SUDAH VERIF EMAIL, datapolos tidak bisa order )',
            'description' => null,
            'original_price' => 20000,
            'sale_price' => null,
        ], $pointBlankImagePath);

        $createService([
            'game_id' => 3,
            'title' => '1 Juta Exp Char Bundir ( WAJIB SUDAH VERIF EMAIL, datapolos tidak bisa order )',
            'description' => null,
            'original_price' => 15000,
            'sale_price' => null,
        ], $pointBlankImagePath);

        $createService([
            'game_id' => 3,
            'title' => '1 Juta Exp Char Glassmode',
            'description' => null,
            'original_price' => 10000,
            'sale_price' => null,
        ], $pointBlankImagePath);

        $createService([
            'game_id' => 3,
            'title' => '3 Juta Exp Char Glassmode',
            'description' => null,
            'original_price' => 23000,
            'sale_price' => null,
        ], $pointBlankImagePath);

        $createService([
            'game_id' => 3,
            'title' => '100.000 Kill',
            'description' => null,
            'original_price' => 100000,
            'sale_price' => null,
        ], $pointBlankImagePath);

        $createService([
            'game_id' => 3,
            'title' => 'FULL TITTLE, minimal point 700k ( WAJIB SUDAH VERIF EMAIL, datapolos tidak bisa order )',
            'description' => null,
            'original_price' => 15000,
            'sale_price' => null,
        ], $pointBlankImagePath);

        $createService([
            'game_id' => 3,
            'title' => '30 Juta Exp Clan',
            'description' => null,
            'original_price' => 185000,
            'sale_price' => null,
        ], $pointBlankImagePath);

        // --- Mobile Legends (Game ID: 2) ---
        $createService([
            'game_id' => 2,
            'title' => 'GM 5 - EPIC 5',
            'description' => '',
            'original_price' => 150000,
            'sale_price' => null,
        ], $mobileLegendImagePath);

        $createService([
            'game_id' => 2,
            'title' => 'MYTHIC GRADING ( FINISH MYTHIC *15 )',
            'description' => '',
            'original_price' => 350000,
            'sale_price' => null,
        ], $mobileLegendImagePath);

        $createService([
            'game_id' => 2,
            'title' => 'Mythic Grading - Mythic Honor 25',
            'description' => null,
            'original_price' => 420000,
            'sale_price' => null,
        ], $mobileLegendImagePath);

        $createService([
            'game_id' => 2,
            'title' => 'Mythic Glory 50 - Mythic Immortal 100',
            'description' => null,
            'original_price' => 1350000,
            'sale_price' => null,
        ], $mobileLegendImagePath);

        $createService([
            'game_id' => 2,
            'title' => 'Legend 5 - Mythic Glory 50',
            'description' => null,
            'original_price' => 1195000,
            'sale_price' => null,
        ], $mobileLegendImagePath);

        $createService([
            'game_id' => 2,
            'title' => 'Legend 5 - Mythic Immortal 100',
            'description' => null,
            'original_price' => 2545000,
            'sale_price' => null,
        ], $mobileLegendImagePath);
    }
}
