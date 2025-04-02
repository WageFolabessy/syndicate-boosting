<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameAccount;
use Illuminate\Http\Request;

class GameAccountPageController extends Controller
{
    public function index(Request $request)
    {
        $query = GameAccount::with('game')
            ->orderBy('updated_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('account_name', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('game', function ($q2) use ($search) {
                        $q2->where('name', 'LIKE', '%' . $search . '%');
                    });
            });
        }

        $gameAccounts = $query->get();

        return view('site-user.pages.akun-game.index', compact('gameAccounts'));
    }

    public function show(Game $game, GameAccount $account)
    {
        $account->load('game');

        return view('site-user.pages.akun-game.show', compact('account'));
    }
}
