<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\BoostingService;
use App\Models\Game;
use Illuminate\Http\Request;

class BoostingServicePageController extends Controller
{
    public function index(Request $request)
    {
        $query = Game::where(function ($q) {
            $q->has('boostingServices')
                ->orHas('rankCategories');
        });

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        $games = $query->get();

        return view('site-user.pages.joki-game.index', compact('games'));
    }

    public function serviceSelection(Game $game)
    {
        $game->load('boostingServices');
        return view('site-user.pages.joki-game.pilih-layanan', compact('game'));
    }

    public function packageBoosting(Game $game)
    {
        $packages = BoostingService::where('game_id', $game->id)->get();

        return view('site-user.pages.joki-game.joki-paket', compact('game', 'packages'));
    }

    public function customBoosting(Game $game)
    {
        return $this->rankBoosting($game);
    }

    public function rankBoosting(Game $game)
    {
        $game->load([
            'rankCategories' => function ($query) {
                $query->orderBy('display_order', 'asc');
            },
            'rankCategories.rankTiers' => function ($query) {
                $query->orderBy('display_order', 'asc');
            },
            'rankCategories.rankTiers.tierDetails' => function ($query) {
                $query->orderBy('display_order', 'asc');
            }
        ]);

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

    public function show(Game $game, BoostingService $service)
    {
        $service->load('game');
        return view('site-user.pages.joki-game.joki-paket-detail', compact('service'));
    }
}
