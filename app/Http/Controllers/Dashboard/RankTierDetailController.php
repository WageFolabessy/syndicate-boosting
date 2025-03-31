<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddRankTierDetailRequest;
use App\Http\Requests\UpdateRankTierDetailRequest;
use App\Models\GameRankTier;
use App\Models\GameRankTierDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RankTierDetailController extends Controller
{
    public function index(Request $request)
    {
        $tierDetails = GameRankTierDetail::join('game_rank_tiers', 'game_rank_tier_details.game_rank_tier_id', '=', 'game_rank_tiers.id')
            ->join('game_rank_categories', 'game_rank_tiers.game_rank_category_id', '=', 'game_rank_categories.id')
            ->join('games', 'game_rank_categories.game_id', '=', 'games.id')
            ->orderBy('games.name', 'asc')
            ->orderBy('game_rank_categories.display_order', 'asc')
            // Urutkan berdasarkan urutan tier yang diinginkan, misalnya: III, II, I
            ->orderByRaw("FIELD(game_rank_tiers.tier, 'V', 'IV', 'III', 'II', 'I')")
            ->orderBy('game_rank_tier_details.display_order', 'asc')
            ->select([
                'game_rank_tier_details.*',
                'game_rank_tiers.tier as tier_name',
                'game_rank_categories.name as category_name',
                'games.name as game_name',
            ])
            ->get();

        return DataTables::of($tierDetails)
            ->addIndexColumn()
            ->editColumn('created_at', function ($detail) {
                return $detail->created_at
                    ? $detail->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->editColumn('updated_at', function ($detail) {
                return $detail->updated_at
                    ? $detail->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->addColumn('action', function ($detail) {
                return view('dashboard.pages.rank-tier-detail.action-button', compact('detail'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $rankTiers = GameRankTier::with(['rankCategory.game'])
            ->orderBy('display_order')
            ->get();

        return view('dashboard.pages.rank-tier-detail.add-rank-tier-detail', compact('rankTiers'));
    }

    public function store(AddRankTierDetailRequest $request)
    {
        $data = $request->validated();
        GameRankTierDetail::create($data);

        return redirect()->route('dashboard.rank-tier-detail')
            ->with('success', 'Rank Tier Detail berhasil ditambahkan.');
    }

    public function show(GameRankTierDetail $detail)
    {
        $rankTiers = GameRankTier::with(['rankCategory.game'])
            ->orderBy('display_order')
            ->get();

        return view('dashboard.pages.rank-tier-detail.edit-rank-tier-detail', compact('detail', 'rankTiers'));
    }

    public function update(UpdateRankTierDetailRequest $request, GameRankTierDetail $detail)
    {
        $data = $request->validated();
        $detail->update($data);

        return redirect()->route('dashboard.rank-tier-detail')
            ->with('success', 'Rank Tier Detail berhasil diperbarui.');
    }

    public function destroy(GameRankTierDetail $detail)
    {
        $detail->delete();

        return redirect()->route('dashboard.rank-tier-detail')
            ->with('success', 'Rank Tier Detail berhasil dihapus.');
    }
}
