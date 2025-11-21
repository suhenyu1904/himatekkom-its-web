<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Department;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::published()
            ->latest('published_at')
            ->take(6)
            ->get();
        
        $upcomingEvents = Event::published()
            ->upcoming()
            ->orderBy('start_date')
            ->take(3)
            ->get();
        
        $departments = Department::where('is_active', true)
            ->orderBy('order')
            ->get();
        
        $galleries = Gallery::published()
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact('latestNews', 'upcomingEvents', 'departments', 'galleries'));
    }
}
