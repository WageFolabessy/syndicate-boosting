<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddGameAccountRequest;
use App\Http\Requests\UpdateGameAccountRequest;
use App\Models\Game;
use App\Models\GameAccount;
use App\Models\Label;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class GameAccountController extends Controller
{
    public function index()
    {
        $gameAccounts = GameAccount::with(['game', 'labels'])->orderBy('updated_at', 'desc')->get();

        return DataTables::of($gameAccounts)
            ->addIndexColumn()
            ->editColumn('image', function ($gameAccount) {
                if ($gameAccount->image) {
                    return '<img src="' . asset('storage/' . $gameAccount->image) . '" alt="Game Account Image" class="img-thumbnail" style="width:100px;">';
                }
                return '-';
            })
            ->editColumn('subtitle', function ($gameAccount) {
                if ($gameAccount->subtitle) {
                    return $gameAccount->subtitle;
                }
                return '-';
            })
            ->editColumn('level', function ($gameAccount) {
                if ($gameAccount->level) {
                    return $gameAccount->level;
                }
                return '-';
            })
            ->editColumn('account_age', function ($gameAccount) {
                if ($gameAccount->account_age) {
                    return $gameAccount->account_age;
                }
                return '-';
            })
            ->editColumn('sale_price', function ($gameAccount) {
                if ($gameAccount->sale_price) {
                    return $gameAccount->sale_price;
                }
                return '-';
            })
            ->editColumn('game_id', function ($gameAccount) {
                return $gameAccount->game ? $gameAccount->game->name : '-';
            })
            ->addColumn('labels', function ($gameAccount) {
                return $gameAccount->labels && $gameAccount->labels->count() > 0
                    ? $gameAccount->labels->pluck('name')->implode(', ')
                    : '-';
            })
            ->editColumn('created_at', function ($gameAccount) {
                return $gameAccount->created_at
                    ? $gameAccount->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->editColumn('updated_at', function ($gameAccount) {
                return $gameAccount->updated_at
                    ? $gameAccount->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->addColumn('action', function ($gameAccount) {
                return view('dashboard.pages.game-account.action-button')->with('gameAccount', $gameAccount);
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }


    public function create()
    {
        $games = Game::orderBy('name')->get();
        $allLabels = Label::orderBy('name')->get();
        return view('dashboard.pages.game-account.add-game-account', compact('games', 'allLabels'));
    }

    public function store(AddGameAccountRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('game-accounts', 'public');
        }

        $gameAccount = GameAccount::create($data);

        // Sinkronisasi label (jika ada)
        $labels = $request->input('labels', []); // labels berupa array ID
        $gameAccount->labels()->sync($labels);

        return redirect()->route('dashboard.game-account')->with('success', 'Akun game berhasil ditambahkan.');
    }

    public function show(GameAccount $gameAccount)
    {
        $games = Game::orderBy('name')->get();
        $allLabels = Label::orderBy('name')->get();
        return view('dashboard.pages.game-account.edit-game-account', compact('gameAccount', 'games', 'allLabels'));
    }

    public function update(UpdateGameAccountRequest $request, GameAccount $gameAccount)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($gameAccount->image && Storage::disk('public')->exists($gameAccount->image)) {
                Storage::disk('public')->delete($gameAccount->image);
            }
            $data['image'] = $request->file('image')->store('game-accounts', 'public');
        } else {
            $data['image'] = $gameAccount->image;
        }

        $gameAccount->update($data);

        // Sinkronisasi label (jika ada)
        $labels = $request->input('labels', []);
        $gameAccount->labels()->sync($labels);

        return redirect()->route('dashboard.game-account')->with('success', 'Akun game berhasil diperbarui.');
    }

    public function destroy(GameAccount $gameAccount)
    {
        if ($gameAccount->image && Storage::disk('public')->exists($gameAccount->image)) {
            Storage::disk('public')->delete($gameAccount->image);
        }

        $gameAccount->delete();

        return redirect()->route('dashboard.game-account')->with('success', 'Akun game berhasil dihapus.');
    }
}
