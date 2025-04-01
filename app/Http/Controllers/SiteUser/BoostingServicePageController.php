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
        return view('site-user.pages.joki-game', compact('games'));
    }

    public function serviceSelection($gameId)
    {
        $game = Game::findOrFail($gameId);
        return view('site-user.pages.pilih-layanan', compact('game'));
    }

    public function packageBoosting($gameId)
    {
        $game = Game::findOrFail($gameId);
        $packages = BoostingService::where('game_id', $gameId)
            ->where('service_type', 'package')
            ->get();

        return view('site-user.pages.joki-paket', compact('game', 'packages'));
    }

    public function customBoosting($gameId)
    {
        return $this->rankBoosting($gameId);
    }

    public function rankBoosting($gameId)
    {
        $game = Game::with([
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

        $defaultRank = $game->rankCategories->sortBy('display_order')->first();
        $defaultTier = $defaultRank->rankTiers->sortBy('display_order')->first();
        $defaultTierDetail = $defaultTier ? $defaultTier->tierDetails->sortBy('display_order')->first() : null;

        return view('site-user.pages.joki-kostum', compact('game', 'defaultRank', 'defaultTier', 'defaultTierDetail'));
    }

    public function show(BoostingService $service)
    {
        $service->load('game');
        return view('site-user.pages.joki-paket-detail', compact('service'));
    }
}
