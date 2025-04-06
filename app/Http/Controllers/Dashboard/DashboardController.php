<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $currentMonth = now()->month;
        $previousMonth = now()->subMonth()->month;

        $currentCustomRevenue = \App\Models\CustomOrderDetail::whereMonth('created_at', $currentMonth)->sum('price');
        $currentPackageRevenue = \App\Models\PackageOrderDetail::whereMonth('created_at', $currentMonth)->sum('price');
        $currentGameAccountRevenue = \App\Models\AccountOrderDetail::whereMonth('created_at', $currentMonth)->sum('price');

        $totalGrossRevenue = $currentCustomRevenue + $currentPackageRevenue + $currentGameAccountRevenue;

        $previousCustomRevenue = \App\Models\CustomOrderDetail::whereMonth('created_at', $previousMonth)->sum('price');
        $previousPackageRevenue = \App\Models\PackageOrderDetail::whereMonth('created_at', $previousMonth)->sum('price');
        $previousGameAccountRevenue = \App\Models\AccountOrderDetail::whereMonth('created_at', $previousMonth)->sum('price');

        $previousTotalGrossRevenue = $previousCustomRevenue + $previousPackageRevenue + $previousGameAccountRevenue;

        $calculateChange = function ($current, $previous) {
            if ($previous > 0) {
                return round((($current - $previous) / $previous) * 100, 2);
            }
            return $current > 0 ? 100 : 0;
        };

        $customBoostingChange = $calculateChange($currentCustomRevenue, $previousCustomRevenue);
        $packageBoostingChange = $calculateChange($currentPackageRevenue, $previousPackageRevenue);
        $gameAccountOrderChange = $calculateChange($currentGameAccountRevenue, $previousGameAccountRevenue);
        $totalGrossChange = $calculateChange($totalGrossRevenue, $previousTotalGrossRevenue);

        return view('dashboard.pages.index', compact(
            'totalGrossRevenue',
            'currentCustomRevenue',
            'currentPackageRevenue',
            'currentGameAccountRevenue',
            'customBoostingChange',
            'packageBoostingChange',
            'gameAccountOrderChange',
            'totalGrossChange'
        ));
    }
}
