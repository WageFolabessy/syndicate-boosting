<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\BoostingService;
use App\Models\Game;
use App\Models\GameAccount;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $games = Game::with(['boostingServices', 'rankCategories'])
            ->where(function ($query) {
                $query->has('boostingServices')
                    ->orHas('rankCategories');
            })
            ->orderBy('updated_at', 'desc')
            ->take(3)
            ->get();

        $gameAccounts = GameAccount::with('game')
            ->orderBy('updated_at', 'desc')
            ->take(3)
            ->get();

        return view('site-user.pages.index', compact('games', 'gameAccounts'));
    }

    public function akunGame()
    {
        $gameAccounts = GameAccount::with('game')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('site-user.pages.akun-game.index', compact('gameAccounts'));
    }
}
