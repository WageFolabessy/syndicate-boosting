<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\GameRankCategory;
use Illuminate\Support\Str;

class MobileLegendRankCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mobileLegendsRankCategories = [
            [
                'game_id' => '2',
                'name' => ucfirst('warrior'),
                'image' => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\1-warrior.jpeg',
                'display_order' => '1',
            ],
            [
                'game_id' => '2',
                'name' => ucfirst('elite'),
                'image' => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\2-elite.jpg',
                'display_order' => '2',
            ],
            [
                'game_id' => '2',
                'name' => ucfirst('master'),
                'image' => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\3-master.jpg',
                'display_order' => '3',
            ],
            [
                'game_id' => '2',
                'name' => 'GM',
                'image' => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\4-gm.jpg',
                'display_order' => '4',
            ],
            [
                'game_id' => '2',
                'name' => ucfirst('epic'),
                'image' => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\5-epic.jpg',
                'display_order' => '5',
            ],
            [
                'game_id' => '2',
                'name' => ucfirst('legend'),
                'image' => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\6-legend.jpg',
                'display_order' => '6',
            ],
            [
                'game_id' => '2',
                'name' => ucfirst('mythic'),
                'image' => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\7-mythic.jpg',
                'display_order' => '7',
            ],
        ];

        foreach ($mobileLegendsRankCategories as $data) {
            // Simpan nilai image ke variabel terpisah
            $imagePath = $data['image'];
            unset($data['image']);

            // Buat record rank category
            $rankCategory = GameRankCategory::create($data);

            // Cek apakah file gambar ada
            if (file_exists($imagePath)) {
                // Generate nama file baru secara random
                $fileName = 'rank-categories/' . Str::random(20) . '.' . pathinfo($imagePath, PATHINFO_EXTENSION);

                // Pindahkan file gambar ke storage public
                Storage::disk('public')->put($fileName, file_get_contents($imagePath));

                // Update field image pada record rank category
                $rankCategory->update(['image' => $fileName]);
            }
        }
    }
}
