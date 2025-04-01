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
        $boostingServices = Game::has('boostingServices')
            ->orderBy('updated_at', 'desc')
            ->take(3)
            ->get();

        // Mengambil semua data akun game, bukan data unik berdasarkan game.
        $gameAccounts = GameAccount::with('game')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('site-user.pages.index', compact('boostingServices', 'gameAccounts'));
    }


    public function akunGame()
    {
        $gameAccounts = GameAccount::with(['game', 'labels'])->orderBy('updated_at', 'desc')->get();
        return view('site-user.pages.akun-game.index', compact('gameAccounts'));
    }
}
