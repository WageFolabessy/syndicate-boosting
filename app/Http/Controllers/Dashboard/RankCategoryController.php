<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\GameRankCategoriesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddRankCategoryRequest;
use App\Http\Requests\UpdateRankCategoryRequest;
use App\Models\Game;
use App\Models\GameRankCategory;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class RankCategoryController extends Controller
{
    public function index()
    {
        $rankCategories = GameRankCategory::join('games', 'games.id', '=', 'game_rank_categories.game_id')
            ->orderBy('games.name', 'asc')
            ->orderBy('game_rank_categories.display_order', 'asc')
            ->select('game_rank_categories.*')
            ->with('game')
            ->get();

        return DataTables::of($rankCategories)
            ->addIndexColumn()
            ->editColumn('image', function ($rankCategory) {
                if ($rankCategory->image) {
                    return '<img alt="Game Image" class="img-thumbnail" src="' . asset('storage/' . $rankCategory->image) . '" style="width:100px">';
                }
                return '-';
            })
            ->editColumn('game_id', function ($rankCategory) {
                return optional($rankCategory->game)->name ?? '-';
            })
            ->editColumn('created_at', function ($rankCategory) {
                return $rankCategory->created_at
                    ? $rankCategory->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->editColumn('updated_at', function ($rankCategory) {
                return $rankCategory->updated_at
                    ? $rankCategory->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->addColumn('action', function ($rankCategory) {
                return view('dashboard.pages.rank-category.action-button', compact('rankCategory'))->render();
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function create()
    {
        $games = Game::orderBy('name')->get();
        return view('dashboard.pages.rank-category.add-rank-category', compact('games'));
    }

    public function store(AddRankCategoryRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('rank-categories', 'public');
        }

        GameRankCategory::create($data);

        return redirect()->route('dashboard.rank-category')
            ->with('success', 'Kategori game berhasil ditambahkan.');
    }

    public function show(GameRankCategory $rankCategory)
    {
        $games = Game::orderBy('name')->get();
        return view('dashboard.pages.rank-category.edit-rank-category', compact('rankCategory', 'games'));
    }

    public function update(UpdateRankCategoryRequest $request, GameRankCategory $rankCategory)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($rankCategory->image && Storage::disk('public')->exists($rankCategory->image)) {
                Storage::disk('public')->delete($rankCategory->image);
            }
            $data['image'] = $request->file('image')->store('rank-categories', 'public');
        } else {
            $data['image'] = $rankCategory->image;
        }

        $rankCategory->update($data);

        return redirect()->route('dashboard.rank-category')
            ->with('success', 'Kategori game berhasil diperbarui.');
    }

    public function destroy(GameRankCategory $rankCategory)
    {
        if ($rankCategory->image && Storage::disk('public')->exists($rankCategory->image)) {
            Storage::disk('public')->delete($rankCategory->image);
        }

        $rankCategory->delete();

        return redirect()->route('dashboard.rank-category')
            ->with('success', 'Kategori game berhasil dihapus.');
    }

    public function export()
    {
        return Excel::download(new GameRankCategoriesExport, 'rank categories managements.xlsx');
    }
}
