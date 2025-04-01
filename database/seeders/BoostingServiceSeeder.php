<?php

namespace Database\Seeders;

use App\Models\BoostingService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $pointBlankImagePath = 'D:\Endricho\RandomTechnology\syndicate-boosting\images\pb-2.jpeg';
        $mobileLegendImagePath = 'D:\Endricho\RandomTechnology\syndicate-boosting\images\ml2.jpg';
        $apexLegendImagePath = 'D:\Endricho\RandomTechnology\syndicate-boosting\images\apex-legend.jpg';

        $dataPBBoosting1 = [
            'game_id' => 3,
            'service_type' => 'package',
            'title' => '1 Juta Exp Char Bundir',
            'description' => '',
            'original_price' => 15000,
            // 'sale_price' => '',
        ];

        if (file_exists($pointBlankImagePath)) {
            $fileName = 'boosting-services/' . Str::random(20) . '.' . pathinfo($pointBlankImagePath, PATHINFO_EXTENSION);
            Storage::disk('public')->put($fileName, file_get_contents($pointBlankImagePath));
            $dataPBBoosting1['image'] = $fileName;
        } else {
            $dataPBBoosting1['image'] = null;
        }

        BoostingService::create($dataPBBoosting1);

        $dataPBBoosting2 = [
            'game_id' => 3,
            'service_type' => 'package',
            'title' => 'JASA ABSEN 1 April - 28 April 2025',
            'description' => '',
            'original_price' => 2500,
            // 'sale_price' => '',
        ];

        if (file_exists($pointBlankImagePath)) {
            $fileName = 'boosting-services/' . Str::random(20) . '.' . pathinfo($pointBlankImagePath, PATHINFO_EXTENSION);
            Storage::disk('public')->put($fileName, file_get_contents($pointBlankImagePath));
            $dataPBBoosting2['image'] = $fileName;
        } else {
            $dataPBBoosting2['image'] = null;
        }

        BoostingService::create($dataPBBoosting2);

        $dataMLBoosting1 = [
            'game_id' => 2,
            'service_type' => 'package',
            'title' => 'GM 5 - EPIC 5',
            'description' => '',
            'original_price' => 112500,
            // 'sale_price' => '',
        ];

        if (file_exists($mobileLegendImagePath)) {
            $fileName = 'boosting-services/' . Str::random(20) . '.' . pathinfo($mobileLegendImagePath, PATHINFO_EXTENSION);
            Storage::disk('public')->put($fileName, file_get_contents($mobileLegendImagePath));
            $dataMLBoosting1['image'] = $fileName;
        } else {
            $dataMLBoosting1['image'] = null;
        }

        BoostingService::create($dataMLBoosting1);

        $dataMLBoosting2 = [
            'game_id' => 2,
            'service_type' => 'package',
            'title' => '[PAKET] MYTHIC GRADING ( FINISH MYTHIC *15 )',
            'description' => '',
            'original_price' => 235000,
            // 'sale_price' => '',
        ];

        if (file_exists($mobileLegendImagePath)) {
            $fileName = 'boosting-services/' . Str::random(20) . '.' . pathinfo($mobileLegendImagePath, PATHINFO_EXTENSION);
            Storage::disk('public')->put($fileName, file_get_contents($mobileLegendImagePath));
            $dataMLBoosting2['image'] = $fileName;
        } else {
            $dataMLBoosting2['image'] = null;
        }

        BoostingService::create($dataMLBoosting2);

        $dataApexLegendBoosting = [
            'game_id' => 1,
            'service_type' => 'custom',
            'title' => 'Rank Boosting',
            'description' => '',
            'original_price' => 0,
            // 'sale_price' => '',
        ];

        if (file_exists($apexLegendImagePath)) {
            $fileName = 'boosting-services/' . Str::random(20) . '.' . pathinfo($apexLegendImagePath, PATHINFO_EXTENSION);
            Storage::disk('public')->put($fileName, file_get_contents($apexLegendImagePath));
            $dataApexLegendBoosting['image'] = $fileName;
        } else {
            $dataApexLegendBoosting['image'] = null;
        }

        BoostingService::create($dataApexLegendBoosting);

        $dataMobileLegendBoosting = [
            'game_id' => 2,
            'service_type' => 'custom',
            'title' => 'Rank Boosting',
            'description' => '',
            'original_price' => 0,
            // 'sale_price' => '',
        ];

        if (file_exists($mobileLegendImagePath)) {
            $fileName = 'boosting-services/' . Str::random(20) . '.' . pathinfo($mobileLegendImagePath, PATHINFO_EXTENSION);
            Storage::disk('public')->put($fileName, file_get_contents($mobileLegendImagePath));
            $dataMobileLegendBoosting['image'] = $fileName;
        } else {
            $dataMobileLegendBoosting['image'] = null;
        }

        BoostingService::create($dataMobileLegendBoosting);
    }
}
