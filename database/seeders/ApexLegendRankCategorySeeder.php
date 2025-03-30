<?php

namespace Database\Seeders;

use App\Models\GameRankCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApexLegendRankCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apexLegendRankCategories = [
            [
                'game_id'       => 1,
                'name'          => 'Rookie',
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\apex-legends\1-rookie.webp',
                'display_order' => 1,
                'system_type'   => 'point',
            ],
            [
                'game_id'       => 1,
                'name'          => 'Bronze',
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\apex-legends\2-bronze.webp',
                'display_order' => 2,
                'system_type'   => 'point',
            ],
            [
                'game_id'       => 1,
                'name'          => 'Silver',
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\apex-legends\3-silver.webp',
                'display_order' => 3,
                'system_type'   => 'point',
            ],
            [
                'game_id'       => 1,
                'name'          => 'Gold',
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\apex-legends\4-gold.webp',
                'display_order' => 4,
                'system_type'   => 'point',
            ],
            [
                'game_id'       => 1,
                'name'          => 'Platinum',
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\apex-legends\5-platinum.webp',
                'display_order' => 5,
                'system_type'   => 'point',
            ],
            [
                'game_id'       => 1,
                'name'          => 'Diamond',
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\apex-legends\6-diamond.webp',
                'display_order' => 6,
                'system_type'   => 'point',
            ],
            [
                'game_id'       => 1,
                'name'          => 'Master',
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\apex-legends\7-master.webp',
                'display_order' => 7,
                'system_type'   => 'point',
            ],
        ];

        foreach ($apexLegendRankCategories as $data) {
            // Simpan nilai image ke variabel terpisah
            $imagePath = $data['image'];
            unset($data['image']);

            // Buat record rank category
            $rankCategory = GameRankCategory::create($data);

            // Cek apakah file gambar ada di path yang ditentukan
            if (file_exists($imagePath)) {
                // Generate nama file baru secara random
                $fileName = 'rank-categories/' . Str::random(20) . '.' . pathinfo($imagePath, PATHINFO_EXTENSION);

                // Pindahkan file gambar ke storage public
                Storage::disk('public')->put($fileName, file_get_contents($imagePath));

                // Update field image pada record rank category dengan nama file baru
                $rankCategory->update(['image' => $fileName]);
            }
        }
    }
}
