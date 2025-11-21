<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::published()->with('department');

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $events = $query->orderBy('start_date', 'desc')->paginate(9);

        return view('events.index', compact('events'));
    }

    public function show(Event $event)
    {
        if (!$event->is_published) {
            abort(404);
        }

        $event->load('department', 'galleries');

        return view('events.show', compact('event'));
    }
}
