<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddRankTierRequest;
use App\Http\Requests\UpdateRankTierRequest;
use App\Models\Game;
use App\Models\GameRankCategory;
use App\Models\GameRankTier;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RankTierController extends Controller
{
    public function index()
    {
        $rankTiers = GameRankTier::join('game_rank_categories', 'game_rank_categories.id', '=', 'game_rank_tiers.game_rank_category_id')
            ->join('games', 'games.id', '=', 'game_rank_categories.game_id')
            ->orderBy('games.name', 'asc')
            ->orderBy('game_rank_categories.display_order', 'asc')
            ->orderByRaw("CASE game_rank_tiers.tier 
            WHEN 'I' THEN 1 
            WHEN 'II' THEN 2 
            WHEN 'III' THEN 3 
            WHEN 'IV' THEN 4 
            WHEN 'V' THEN 5 
            WHEN 'VI' THEN 6 
            WHEN 'VII' THEN 7 
            WHEN 'VIII' THEN 8 
            ELSE 0 
         END ASC")
            ->select([
                'game_rank_tiers.*',
                'game_rank_categories.name as category_name',
                'games.name as game_name',
            ])
            ->get();

        return DataTables::of($rankTiers)
            ->addIndexColumn()
            ->editColumn('created_at', function ($tier) {
                return $tier->created_at ? $tier->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s') : '';
            })
            ->editColumn('updated_at', function ($tier) {
                return $tier->updated_at ? $tier->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s') : '';
            })
            ->addColumn('action', function ($tier) {
                return view('dashboard.pages.rank-tier.action-button')->with('rankTier', $tier);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $rankCategories = GameRankCategory::with('game')
            ->join('games', 'games.id', '=', 'game_rank_categories.game_id')
            ->orderBy('games.name', 'asc')
            ->orderBy('game_rank_categories.display_order', 'asc')
            ->select('game_rank_categories.*')
            ->get();

        return view('dashboard.pages.rank-tier.add-rank-tier', compact('rankCategories'));
    }

    public function store(AddRankTierRequest $request)
    {
        $data = $request->validated();
        GameRankTier::create($data);
        return redirect()->route('dashboard.rank-tier')->with('success', 'Rank Tier berhasil ditambahkan.');
    }

    public function show(GameRankTier $rankTier)
    {
        $rankCategories = GameRankCategory::with('game')
            ->join('games', 'games.id', '=', 'game_rank_categories.game_id')
            ->orderBy('games.name', 'asc')
            ->orderBy('game_rank_categories.display_order', 'asc')
            ->select('game_rank_categories.*')
            ->get();

        return view('dashboard.pages.rank-tier.edit-rank-tier', compact('rankTier', 'rankCategories'));
    }

    public function update(UpdateRankTierRequest $request, GameRankTier $rankTier)
    {
        $data = $request->validated();
        $rankTier->update($data);
        return redirect()->route('dashboard.rank-tier')->with('success', 'Rank Tier berhasil diperbarui.');
    }

    public function destroy(GameRankTier $rankTier)
    {
        $rankTier->delete();
        return redirect()->route('dashboard.rank-tier')->with('success', 'Rank Tier berhasil dihapus.');
    }
}
