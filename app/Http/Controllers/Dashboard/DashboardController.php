<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AccountOrderDetail;
use App\Models\CustomOrderDetail;
use App\Models\PackageOrderDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $currentMonth = now()->month;
        $previousMonth = now()->subMonth()->month;

        $currentCustomRevenue = CustomOrderDetail::whereHas('transaction', function ($q) {
            $q->where('status', 'success');
        })->whereMonth('created_at', $currentMonth)->sum('price');

        $currentPackageRevenue = PackageOrderDetail::whereHas('transaction', function ($q) {
            $q->where('status', 'success');
        })->whereMonth('created_at', $currentMonth)->sum('price');

        $currentGameAccountRevenue = AccountOrderDetail::whereHas('transaction', function ($q) {
            $q->where('status', 'success');
        })->whereMonth('created_at', $currentMonth)->sum('price');

        $totalGrossRevenue = $currentCustomRevenue + $currentPackageRevenue + $currentGameAccountRevenue;

        $previousCustomRevenue = CustomOrderDetail::whereHas('transaction', function ($q) {
            $q->where('status', 'success');
        })->whereMonth('created_at', $previousMonth)->sum('price');

        $previousPackageRevenue = PackageOrderDetail::whereHas('transaction', function ($q) {
            $q->where('status', 'success');
        })->whereMonth('created_at', $previousMonth)->sum('price');

        $previousGameAccountRevenue = AccountOrderDetail::whereHas('transaction', function ($q) {
            $q->where('status', 'success');
        })->whereMonth('created_at', $previousMonth)->sum('price');

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
