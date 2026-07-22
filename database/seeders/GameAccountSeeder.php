<?php

namespace Database\Seeders;

use App\Models\GameAccount;
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

        // Helper closure to upload image and create game account
        $createAccount = function (array $data, ?string $sourceImagePath) {
            if ($sourceImagePath && file_exists($sourceImagePath)) {
                $ext = pathinfo($sourceImagePath, PATHINFO_EXTENSION);
                $fileName = 'game-accounts/'.Str::random(20).'.'.$ext;
                Storage::disk('public')->put($fileName, file_get_contents($sourceImagePath));
                $data['image'] = $fileName;
            } else {
                $data['image'] = null;
            }

            return GameAccount::create($data);
        };

        // --- Point Blank (Game ID: 3) ---
        $createAccount([
            'game_id' => 3,
            'account_name' => 'Bintang 2',
            'username' => 'gmpsl336',
            'password' => 'bintang2',
            'description' => '',
            'features' => 'QC 220 hari+HK,Butterfly, Idol CT Tero Permanent+Pindad, Ninjato, 2 Karakter Permanent+Inventory 636/600+EXP 74jt+FREE GB KE B3/ B4/HERO',
            'original_price' => 650000,
            'sale_price' => null,
            'account_age' => '2 Tahun',
            'for_sale' => true,
        ], $pointBlankImagePath);

        $createAccount([
            'game_id' => 3,
            'account_name' => 'Major',
            'username' => 'pb123',
            'password' => 'pb123456',
            'description' => '',
            'features' => 'QC 10 hari+Inventory 175an',
            'original_price' => 25000,
            'sale_price' => null,
            'account_age' => '6 Bulan',
            'for_sale' => true,
        ], $pointBlankImagePath);

        $createAccount([
            'game_id' => 3,
            'account_name' => 'Bintang 1',
            'username' => 'playboy21',
            'password' => 'password',
            'description' => null,
            'features' => "1 QC 86-92 hari\r\nt77 5-10 hari\r\nkar 5 hari\r\nsaber 18 hari\r\nmedkit 45-54 hari\r\ninventory 537/600",
            'original_price' => 70000,
            'sale_price' => null,
            'account_age' => null,
            'for_sale' => true,
        ], $pointBlankImagePath);

        $createAccount([
            'game_id' => 3,
            'account_name' => 'Bintang 4',
            'username' => 'asbun321',
            'password' => 'password',
            'description' => null,
            'features' => "QC 221 hari\r\nt77 Wild Arena, C-5 Wild Arena, 2 karakter permanent \r\nFangblade Permanent\r\nt77 26 hari\r\nsaber 38 hari\r\nkar 11 hari\r\nmedkit 72 hari\r\nidol 32 hari\r\nwig 16 hari\r\nPink Whale Keychain Permanent\r\nInventory 825/750",
            'original_price' => 1200000,
            'sale_price' => null,
            'account_age' => null,
            'for_sale' => true,
        ], $pointBlankImagePath);

        $createAccount([
            'game_id' => 3,
            'account_name' => 'HERO',
            'username' => 'acillubu',
            'password' => 'password',
            'description' => null,
            'features' => "QC 221 hari\r\nt77 Wild Arena, C-5 Wild Arena, 2 karakter permanent \r\nFangblade Permanent \r\nt77 26 hari \r\nkar 11 hari \r\nsaber 38 hari \r\nidol 32 hari \r\nwig 16 hari \r\nPink Whale Keychain Permanent \r\nInventory 825/750",
            'original_price' => 1200000,
            'sale_price' => null,
            'account_age' => null,
            'for_sale' => true,
        ], $pointBlankImagePath);

        $createAccount([
            'game_id' => 3,
            'account_name' => 'MAJOR',
            'username' => 'pbbalak321',
            'password' => 'password',
            'description' => null,
            'features' => "QC 200-219 hari \r\nt77 5-9 hari \r\nkar 12 hari \r\nsaber 36-45 hari \r\nmedkit 49-69 hari \r\nidol 14-20 hari \r\nwig 7-10 hari \r\nberet skull 3 hari \r\ninventory 640/600",
            'original_price' => 85000,
            'sale_price' => 77500,
            'account_age' => null,
            'for_sale' => true,
        ], $pointBlankImagePath);
    }
}
