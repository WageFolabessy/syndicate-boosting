<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apexLegendImagePath = 'D:\Endricho\RandomTechnology\syndicate-boosting\images\apex-legend.jpg';
        $mobileLegendImagePath = 'D:\Endricho\RandomTechnology\syndicate-boosting\images\ml2.jpg';
        $pointBlankImagePath = 'D:\Endricho\RandomTechnology\syndicate-boosting\images\pb-2.jpeg';

        // Data untuk Apex Legends
        $dataApex = [
            'name'        => 'Apex Legends',
            'genre'       => 'FPS',
            'developer'   => 'Respawn Entertainment',
            'description' => 'Apex Legends is the award-winning, free-to-play Hero Shooter from Respawn Entertainment. Master an ever-growing roster of legendary characters with powerful abilities, and experience strategic squad play and innovative gameplay in the next evolution of Hero Shooter and Battle Royale.',
        ];
        if (file_exists($apexLegendImagePath)) {
            $fileName = 'games/' . Str::random(20) . '.' . pathinfo($apexLegendImagePath, PATHINFO_EXTENSION);
            Storage::disk('public')->put($fileName, file_get_contents($apexLegendImagePath));
            $dataApex['image'] = $fileName;
        } else {
            $dataApex['image'] = null;
        }
        Game::create($dataApex);

        // Data untuk Mobile Legends: Bang Bang
        $dataML = [
            'name'        => 'Mobile Legends: Bang Bang',
            'genre'       => 'MOBA',
            'developer'   => 'Moonton',
            'description' => 'Mobile Legends: Bang Bang (MLBB) is a mobile multiplayer online battle arena (MOBA) game developed and published by Chinese developer Moonton, a subsidiary of ByteDance. The game was released in 2016 and grew in popularity, most prominently in Southeast Asia.',
        ];
        if (file_exists($mobileLegendImagePath)) {
            $fileName = 'games/' . Str::random(20) . '.' . pathinfo($mobileLegendImagePath, PATHINFO_EXTENSION);
            Storage::disk('public')->put($fileName, file_get_contents($mobileLegendImagePath));
            $dataML['image'] = $fileName;
        } else {
            $dataML['image'] = null;
        }
        Game::create($dataML);

        // Data untuk Point Blank: Beyond Limits
        $datPB = [
            'name'        => 'Point Blank: Beyond Limits',
            'genre'       => 'FPS',
            'developer'   => 'Zepetto',
            'description' => 'Point Blank: Beyond Limits adalah Game FPS Favorite sejak 2009. Point Blank Beyond Limit adalah game FPS No. 1 Indonesia selama 10 tahun. Dimainkan di 100 negara dan memiliki 100 juta player dunia.',
        ];
        if (file_exists($pointBlankImagePath)) {
            $fileName = 'games/' . Str::random(20) . '.' . pathinfo($pointBlankImagePath, PATHINFO_EXTENSION);
            Storage::disk('public')->put($fileName, file_get_contents($pointBlankImagePath));
            $datPB['image'] = $fileName;
        } else {
            $datPB['image'] = null;
        }
        Game::create($datPB);
    }
}
