<?php

namespace Database\Seeders;

use App\Models\GameAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GameAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pointBlankImagePath = public_path('images/games/pb.jpeg');

        $dataPBGameAccount1 = [
            'game_id' => 3,
            'account_name' => 'Bintang 2',
            'description' => '',
            'features' => 'QC 220 hari+HK,Butterfly, Idol CT Tero Permanent+Pindad, Ninjato, 2 Karakter Permanent+Inventory 636/600+EXP 74jt+FREE GB KE B3/ B4/HERO',
            'original_price' => 1250000,
            // 'sale_price' => 0,
            // 'level' => '',
            'account_age' => '2 Tahun',
        ];

        if (file_exists($pointBlankImagePath)) {
            $fileName = 'game-accounts/' . Str::random(20) . '.' . pathinfo($pointBlankImagePath, PATHINFO_EXTENSION);
            Storage::disk('public')->put($fileName, file_get_contents($pointBlankImagePath));
            $dataPBGameAccount1['image'] = $fileName;
        } else {
            $dataPBGameAccount1['image'] = null;
        }

        GameAccount::create($dataPBGameAccount1);

        $dataPBGameAccount2 = [
            'game_id' => 3,
            'account_name' => 'Major',
            'description' => '',
            'features' => 'QC 10 hari+Inventory 175an',
            'original_price' => 25000,
            // 'sale_price' => 0,
            // 'level' => '',
            'account_age' => '6 Bulan',
        ];

        if (file_exists($pointBlankImagePath)) {
            $fileName = 'game-accounts/' . Str::random(20) . '.' . pathinfo($pointBlankImagePath, PATHINFO_EXTENSION);
            Storage::disk('public')->put($fileName, file_get_contents($pointBlankImagePath));
            $dataPBGameAccount2['image'] = $fileName;
        } else {
            $dataPBGameAccount2['image'] = null;
        }

        GameAccount::create($dataPBGameAccount2);
    }
}
