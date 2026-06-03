<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{
    public function index()
    {
        $reminders = Auth::user()->reminders()->orderBy('date', 'asc')->get();
        return view('reminders.index', compact('reminders'));
    }

    public function create()
    {
        return view('reminders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        Auth::user()->reminders()->create($request->all());

        return redirect()->route('reminders.index')->with('toast_success', 'Reminder added successfully!');
    }

    public function edit(Reminder $reminder)
    {
        $this->authorizeUser($reminder);
        return view('reminders.edit', compact('reminder'));
    }

    public function update(Request $request, Reminder $reminder)
    {
        $this->authorizeUser($reminder);

        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $reminder->update($request->all());

        return redirect()->route('reminders.index')->with('toast_success', 'Reminder updated successfully!');
    }

    public function destroy(Reminder $reminder)
    {
        $this->authorizeUser($reminder);
        $reminder->delete();

        return redirect()->route('reminders.index')->with('toast_success', 'Reminder deleted successfully!');
    }

    private function authorizeUser(Reminder $reminder)
    {
        if ($reminder->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
