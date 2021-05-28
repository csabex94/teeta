<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class EventsController extends Controller {

    public function __construct() {
        
    }

    public function show() {
        return Inertia::render('Events/Show', [
            'events' => Event::where('user_id', Auth::id())->orderBy('date', 'asc')->get()
        ]);
    }

    public function create() {
        return Inertia::render('Events/Create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => ['required', 'max:50'],
            'description' => ['required'],
            'date' => ['required', 'date']
        ]);

        if($validated) {
            Event::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'date' => $request->input('date'),
                'user_id' => Auth::id()
            ]);
        }

        return Redirect::route('events.show')->with('success', 'Event created.');
    }

    public function edit(Event $event)
    {
        return Inertia::render('Events/Edit', [
            'event' => [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'date' => $event->date
            ]
        ]);
    }

    public function update(Event $event) {


        return Redirect::back()->with('success', 'Event updated.');
    }

    public function destroy(Event $event) {
        $event->delete();

        return Redirect::back()->with('success', 'Event deleted.');
    }

    public function restore(Event $event) {
        $event->restore();

        return Redirect::back()->with('success', 'Event restored.');
    }
}
