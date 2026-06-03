<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller 
{
    public function index() 
    {
        $user = Auth::user();

        // Auto-update statuses to Overdue
        $user->reminders()
            ->where('date', '<', Carbon::today())
            ->where('status', 'Upcoming')
            ->update(['status' => 'Overdue']);

        // Personal User Stats
        $total = $user->reminders()->count();
        $upcoming = $user->reminders()->where('status', 'Upcoming')->count();
        $overdue = $user->reminders()->where('status', 'Overdue')->count();
        $completed = $user->reminders()->where('status', 'Completed')->count();

        // System Analytics (For Admin View Panels)
        $totalSystemUsers = User::count();
        $usersWithReminders = User::has('reminders')->count();
        $usersWithoutReminders = $totalSystemUsers - $usersWithReminders;

        return view('dashboard.index', compact(
            'total', 
            'upcoming', 
            'overdue', 
            'completed', 
            'totalSystemUsers', 
            'usersWithReminders', 
            'usersWithoutReminders'
        ));
    }
}