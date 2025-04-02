<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameAccount;
use Illuminate\Http\Request;

class GameAccountPageController extends Controller
{
    public function index()
    {
        $gameAccounts = GameAccount::with('game')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('site-user.pages.akun-game.index', compact('gameAccounts'));
    }

    public function show(Game $game, GameAccount $account)
    {
        $account->load('game');

        return view('site-user.pages.akun-game.show', compact('account'));
    }
}
