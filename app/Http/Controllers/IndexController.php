<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Lokasi;
use App\Models\Proyek;
use Illuminate\Routing\Controller;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        $jmlhCrew = Crew::all()->where('status_crew', true)->count();
        $jmlhLokasi = Lokasi::all()->count();
        $jmlhProyek = Proyek::all()->count();
        return view('pages.index', compact('jmlhCrew','jmlhLokasi', 'jmlhProyek'));
    }

}
