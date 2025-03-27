<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\BoostingService;
use Illuminate\Http\Request;

class BoostingServicePageController extends Controller
{
    public function index()
    {
        $services = BoostingService::with('game')->orderBy('created_at', 'desc')->get();
        return view('site-user.pages.joki-game', compact('services'));
    }

    public function show(BoostingService $service)
    {
        $service->load('game');
        return view('site-user.pages.boosting-service-detail', compact('service'));
    }
}
