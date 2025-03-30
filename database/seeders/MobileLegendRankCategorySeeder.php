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
                'game_id'       => 2,
                'name'          => ucfirst('warrior'),
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\1-warrior.png',
                'display_order' => 1,
                'system_type'   => 'star',
            ],
            [
                'game_id'       => 2,
                'name'          => ucfirst('elite'),
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\2-elite.png',
                'display_order' => 2,
                'system_type'   => 'star',
            ],
            [
                'game_id'       => 2,
                'name'          => ucfirst('master'),
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\3-master.png',
                'display_order' => 3,
                'system_type'   => 'star',
            ],
            [
                'game_id'       => 2,
                'name'          => 'GM',
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\4-gm.png',
                'display_order' => 4,
                'system_type'   => 'star',
            ],
            [
                'game_id'       => 2,
                'name'          => ucfirst('epic'),
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\5-epic.png',
                'display_order' => 5,
                'system_type'   => 'star',
            ],
            [
                'game_id'       => 2,
                'name'          => ucfirst('legend'),
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\6-legend.png',
                'display_order' => 6,
                'system_type'   => 'star',
            ],
            [
                'game_id'       => 2,
                'name'          => ucfirst('mythic'),
                'image'         => 'D:\Endricho\RandomTechnology\syndicate-boosting\images\mobile-legends\7-mythic.png',
                'display_order' => 7,
                'system_type'   => 'star',
            ],
        ];

        foreach ($mobileLegendsRankCategories as $data) {
            $imagePath = $data['image'];
            unset($data['image']);

            $rankCategory = GameRankCategory::create($data);

            if (file_exists($imagePath)) {
                $fileName = 'rank-categories/' . Str::random(20) . '.' . pathinfo($imagePath, PATHINFO_EXTENSION);

                Storage::disk('public')->put($fileName, file_get_contents($imagePath));

                $rankCategory->update(['image' => $fileName]);
            }
        }
    }
}
