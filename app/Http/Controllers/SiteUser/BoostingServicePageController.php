<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\BoostingService;
use App\Models\Game;

class BoostingServicePageController extends Controller
{
    public function index()
    {
        $games = Game::where(function ($query) {
            $query->has('boostingServices')
                ->orHas('rankCategories');
        })->get();

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
        $packages = BoostingService::where('game_id', $gameId)->get();

        return view('site-user.pages.joki-game.joki-paket', compact('game', 'packages'));
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

        if ($game->rankCategories->isEmpty()) {
            abort(404);
        }

        $defaultRank = $game->rankCategories->sortBy('display_order')->first();
        $defaultTier = $defaultRank->rankTiers->sortBy('display_order')->first();
        $defaultTierDetail = $defaultTier
            ? $defaultTier->tierDetails->sortBy('display_order')->first()
            : null;

        return view('site-user.pages.joki-game.joki-kostum', compact('game', 'defaultRank', 'defaultTier', 'defaultTierDetail'));
    }

    public function show(BoostingService $service)
    {
        $service->load('game');
        return view('site-user.pages.joki-game.joki-paket-detail', compact('service'));
    }
}
