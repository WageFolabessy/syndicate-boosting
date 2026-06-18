<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameAccount;
use App\Models\Review;

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

    public function privacyPolicy()
    {
        return view('site-user.pages.privacy-policy');
    }

    public function termsOfService()
    {
        return view('site-user.pages.terms-of-service');
    }
}
