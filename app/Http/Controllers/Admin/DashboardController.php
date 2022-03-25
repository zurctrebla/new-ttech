<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    User
};

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::/* where('tenant_id', $tenant->id)-> */count();

        return view('admin.pages.home.index', compact(
            'totalUsers'
        ));
    }
}
