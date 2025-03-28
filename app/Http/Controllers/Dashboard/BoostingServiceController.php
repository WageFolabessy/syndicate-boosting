<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddBoostingServiceRequest;
use App\Http\Requests\UpdateBoostingServiceRequest;
use App\Models\BoostingService;
use App\Models\Game;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BoostingServiceController extends Controller
{
    public function index()
    {
        $services = BoostingService::with(['game', 'labels'])->orderBy('updated_at', 'desc')->get();

        return DataTables::of($services)
            ->addIndexColumn()
            ->editColumn('image', function ($service) {
                if ($service->image) {
                    return '<img src="' . asset('storage/' . $service->image) . '" alt="Service Image" class="img-thumbnail" style="width:100px;">';
                }
                return '-';
            })
            ->editColumn('service_type', function ($service) {
                return $service->service_type ? ucfirst($service->service_type) : '-';
            })
            ->editColumn('created_at', function ($service) {
                return $service->created_at
                    ? $service->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->editColumn('updated_at', function ($service) {
                return $service->updated_at
                    ? $service->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->addColumn('game_name', function ($service) {
                return $service->game ? $service->game->name : '-';
            })
            ->addColumn('labels', function ($service) {
                return $service->labels && $service->labels->count() > 0
                    ? $service->labels->pluck('name')->implode(', ')
                    : '-';
            })
            ->addColumn('action', function ($service) {
                return view('dashboard.pages.boosting-service.action-button')->with('service', $service);
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function create()
    {
        $games = Game::orderBy('name')->get();
        $allLabels = Label::orderBy('name')->get();
        return view('dashboard.pages.boosting-service.add-boosting-service', compact('games', 'allLabels'));
    }

    public function store(AddBoostingServiceRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('boosting-services', 'public');
        }

        $service = BoostingService::create($data);

        // Sinkronisasi label (jika ada)
        $labels = $request->input('labels', []); // labels berupa array ID
        $service->labels()->sync($labels);

        return redirect()->route('dashboard.boosting-service')->with('success', 'Boosting Service berhasil ditambahkan.');
    }

    public function show(BoostingService $service)
    {
        $games = Game::orderBy('name')->get();
        $allLabels = Label::orderBy('name')->get();
        return view('dashboard.pages.boosting-service.edit-boosting-service', compact('service', 'games', 'allLabels'));
    }

    public function update(UpdateBoostingServiceRequest $request, BoostingService $service)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('boosting-services', 'public');
        } else {
            $data['image'] = $service->image;
        }

        $service->update($data);

        // Sinkronisasi label (jika ada)
        $labels = $request->input('labels', []);
        $service->labels()->sync($labels);

        return redirect()->route('dashboard.boosting-service')->with('success', 'Boosting Service berhasil diperbarui.');
    }

    public function destroy(BoostingService $service)
    {
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('dashboard.boosting-service')->with('success', 'Boosting Service berhasil dihapus.');
    }
}
