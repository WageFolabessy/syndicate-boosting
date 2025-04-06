<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\BoostingService;
use App\Models\Game;
use App\Models\GameAccount;
use App\Models\Review;
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
            ->where('for_sale', true)
            ->orderBy('updated_at', 'desc')
            ->take(3)
            ->get();

        $reviews = Review::where('rating', '>=', 3)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('site-user.pages.index', compact('games', 'gameAccounts', 'reviews'));
    }

    public function akunGame()
    {
        $gameAccounts = GameAccount::with('game')
            ->where('for_sale', true)
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('site-user.pages.akun-game.index', compact('gameAccounts'));
    }
}
