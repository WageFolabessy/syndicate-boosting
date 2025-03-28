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
        // Lokasi file gambar di luar project
        $imagePath = 'D:\Endricho\RandomTechnology\syndicate-boosting\images\apex-legend.jpg';

        $data = [
            'name'        => 'Apex Legends',
            'genre'       => 'FPS',
            'developer'   => 'Respawn Entertainment',
            'description' => 'Apex Legends is the award-winning, free-to-play Hero Shooter from Respawn Entertainment. Master an ever-growing roster of legendary characters with powerful abilities, and experience strategic squad play and innovative gameplay in the next evolution of Hero Shooter and Battle Royale.',
        ];

        // Cek apakah file gambar ada di lokasi yang ditentukan
        if (file_exists($imagePath)) {
            // Generate nama file baru secara random dan simpan ke folder 'games'
            $fileName = 'games/' . Str::random(20) . '.' . pathinfo($imagePath, PATHINFO_EXTENSION);

            // Pindahkan file gambar ke storage public
            Storage::disk('public')->put($fileName, file_get_contents($imagePath));

            // Simpan path file gambar yang baru ke dalam data yang akan diinsert
            $data['image'] = $fileName;
        } else {
            // Jika file tidak ada, Anda bisa set nilai default atau null
            $data['image'] = null;
        }

        // Buat record Game baru
        Game::create($data);
    }
}
