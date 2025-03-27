<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddBoostingServiceRequest;
use App\Http\Requests\UpdateBoostingServiceRequest;
use App\Models\BoostingService;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BoostingServiceController extends Controller
{
    public function index()
    {
        $services = BoostingService::with('game')->orderBy('updated_at', 'desc')->get();

        return DataTables::of($services)
            ->addIndexColumn()
            ->editColumn('image', function ($service) {
                if ($service->image) {
                    return '<img src="' . asset('storage/' . $service->image) . '" alt="Service Image" class="img-thumbnail" style="width:100px;">';
                }
                return '-';
            })
            ->editColumn('service_type', function ($service) {
                if ($service->service_type) {
                    return ucfirst($service->service_type);
                }
                return '-';
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
            ->addColumn('action', function ($service) {
                return view('dashboard.pages.boosting-service.action-button')->with('service', $service);
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function create()
    {
        $games = Game::orderBy('name')->get();
        return view('dashboard.pages.boosting-service.add-boosting-service', compact('games'));
    }

    public function store(AddBoostingServiceRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('boosting-services', 'public');
        }

        BoostingService::create($data);

        return redirect()->route('dashboard.boosting-service')->with('success', 'Boosting Service berhasil ditambahkan.');
    }

    public function show(BoostingService $service)
    {
        $games = Game::orderBy('name')->get();
        return view('dashboard.pages.boosting-service.edit-boosting-service', compact('service', 'games'));
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
