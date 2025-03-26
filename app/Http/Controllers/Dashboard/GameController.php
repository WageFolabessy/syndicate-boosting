<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::orderBy('updated_at', 'desc')->get();

        return DataTables::of($games)
            ->addIndexColumn()
            ->editColumn('image', function ($game) {
                if ($game->image) {
                    return '<img src="' . asset('storage/' . $game->image) . '" alt="Game Image" class="img-thumbnail" style="width:100px;">';
                }
                return '-';
            })
            ->editColumn('created_at', function ($game) {
                return $game->created_at
                    ? $game->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->editColumn('updated_at', function ($game) {
                return $game->updated_at
                    ? $game->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->addColumn('action', function ($game) {
                return view('dashboard.pages.game.action-button')->with('games', $game);
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('dashboard.pages.game.add-game');
    }

    public function store(AddGameRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('games', 'public');
        }

        Game::create($data);

        return redirect()->route('dashboard.game')->with('success', 'Game berhasil ditambahkan.');
    }

    public function show(Game $game)
    {
        return view('dashboard.pages.game.edit-game', compact('game'));
    }

    public function update(UpdateGameRequest $request, Game $game)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($game->image && Storage::disk('public')->exists($game->image)) {
                Storage::disk('public')->delete($game->image);
            }
            $data['image'] = $request->file('image')->store('games', 'public');
        } else {
            $data['image'] = $game->image;
        }

        $game->update($data);

        return redirect()->route('dashboard.game')->with('success', 'Game berhasil diperbarui.');
    }
    
    public function destroy(Game $game)
    {
        if ($game->image && Storage::disk('public')->exists($game->image)) {
            Storage::disk('public')->delete($game->image);
        }

        $game->delete();

        return redirect()->route('dashboard.game')->with('success', 'Game berhasil dihapus.');
    }
}
