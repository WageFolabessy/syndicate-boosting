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
        $services = BoostingService::with('game')->orderBy('created_at', 'desc')->get();
        return view('site-user.pages.joki-game', compact('services'));
    }

    public function show(BoostingService $service)
    {
        $service->load('game');
        return view('site-user.pages.boosting-service-detail', compact('service'));
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

        return view('site-user.pages.rank-boosting', compact('game'));
    }
}
