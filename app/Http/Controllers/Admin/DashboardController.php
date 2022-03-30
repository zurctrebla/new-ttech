<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Locator,
    Order,
    Reading,
    Report,
    User
};

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::/* where('tenant_id', $tenant->id)-> */count();
        $totalLocators = Locator::/* where('tenant_id', $tenant->id)-> */count();
        $totalReadings = Reading::/* where('tenant_id', $tenant->id)-> */count();
        $totalOrders = Order::where('status', 'Aberto')->count();
        $totalReports = Report::where('status', 'Aberto')->count();

        return view('admin.pages.home.index', compact(
            'totalUsers',
            'totalLocators',
            'totalReadings',
            'totalOrders',
            'totalReports'
        ));
    }
}
