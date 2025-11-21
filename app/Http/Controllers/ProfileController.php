<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\OrganizationStructure;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function sejarah()
    {
        $profile = Profile::getByKey('sejarah');
        return view('profile.sejarah', compact('profile'));
    }

    public function visiMisi()
    {
        $visi = Profile::getByKey('visi');
        $misi = Profile::getByKey('misi');
        return view('profile.visi-misi', compact('visi', 'misi'));
    }

    public function struktur()
    {
        $structures = OrganizationStructure::orderBy('order')
            ->with('department')
            ->get()
            ->groupBy('level');

        return view('profile.struktur', compact('structures'));
    }
}
