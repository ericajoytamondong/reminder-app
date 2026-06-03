<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Dynamically update statuses to Overdue if needed before calculating card statistics
        $user->reminders()->where('date', '<', Carbon::today())->where('status', 'Upcoming')->update(['status' => 'Overdue']);

        $total = $user->reminders()->count();
        $upcoming = $user->reminders()->where('status', 'Upcoming')->count();
        $overdue = $user->reminders()->where('status', 'Overdue')->count();
        $completed = $user->reminders()->where('status', 'Completed')->count();

        return view('dashboard.index', compact('total', 'upcoming', 'overdue', 'completed'));
    }
}