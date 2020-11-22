<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\AuthorizableController;
use App\Models\User;

class StatisticsController extends AuthorizableController
{
    
    public function index()
    {
        $totalUsers = User::count();
        $totalUsersLastWeek = User::whereDate('created_at', '>', now()->subDays(7))->count();
        
        $totalVisits = visits(User::class, 'visits')->count();
        $totalVisitsLastWeek = visits(User::class, 'visits')->period('week')->count();
        
        return view('dashboard.core.statistics.index', compact(
            'totalUsers',
            'totalUsersLastWeek',
            'totalVisits',
            'totalVisitsLastWeek'
        ));
    }

}
