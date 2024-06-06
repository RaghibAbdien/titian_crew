<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\Crew;
use App\Models\Notification;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        $jmlhCrew = Crew::all()->where('status_crew', true)->count();
        $jmlhLokasi = Lokasi::all()->count();
        return view('pages.index', compact('jmlhCrew','jmlhLokasi'));
    }

}
