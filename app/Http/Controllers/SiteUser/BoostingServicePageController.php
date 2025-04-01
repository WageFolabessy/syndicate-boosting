<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\BoostingService;
use App\Models\Game;
use App\Models\GameRankCategory;
use Illuminate\Http\Request;

class BoostingServicePageController extends Controller
{
    public function index()
    {
        $games = Game::has('boostingServices')->get();
        return view('site-user.pages.joki-game.index', compact('games'));
    }

    public function serviceSelection($gameId)
    {
        $game = Game::with('boostingServices')->findOrFail($gameId);
        return view('site-user.pages.joki-game.pilih-layanan', compact('game'));
    }

    public function packageBoosting($gameId)
    {
        $game = Game::findOrFail($gameId);
        $packages = BoostingService::where('game_id', $gameId)
            ->where('service_type', 'package')
            ->get();

        return view('site-user.pages.joki-game.joki-paket', compact('game', 'packages'));
    }

    public function customBoosting($gameId)
    {
        return $this->rankBoosting($gameId);
    }

    public function rankBoosting($gameId)
    {
        $game = Game::with([
            'boostingServices', // Eager load boostingServices agar bisa dicek
            'rankCategories' => function ($query) {
                $query->orderBy('display_order', 'asc');
            },
            'rankCategories.rankTiers' => function ($query) {
                $query->orderBy('display_order', 'asc');
            },
            'rankCategories.rankTiers.tierDetails' => function ($query) {
                $query->orderBy('display_order', 'asc');
            }
        ])->findOrFail($gameId);

        // Cek apakah game memiliki boosting service dengan service_type "custom"
        if (!$game->boostingServices->contains('service_type', 'custom')) {
            abort(404);
        }

        $defaultRank = $game->rankCategories->sortBy('display_order')->first();
        $defaultTier = $defaultRank->rankTiers->sortBy('display_order')->first();
        $defaultTierDetail = $defaultTier ? $defaultTier->tierDetails->sortBy('display_order')->first() : null;

        return view('site-user.pages.joki-game.joki-kostum', compact('game', 'defaultRank', 'defaultTier', 'defaultTierDetail'));
    }

    public function show(BoostingService $service)
    {
        if ($service->service_type === 'custom') {
            abort(404);
        }
        $service->load('game');
        return view('site-user.pages.joki-game.joki-paket-detail', compact('service'));
    }
}
