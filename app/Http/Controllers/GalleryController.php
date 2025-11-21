<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::published()
            ->with('images')
            ->latest()
            ->paginate(12);

        return view('gallery.index', compact('galleries'));
    }

    public function show(Gallery $gallery)
    {
        if (!$gallery->is_published) {
            abort(404);
        }

        $gallery->load('images', 'event');

        return view('gallery.show', compact('gallery'));
    }
}
