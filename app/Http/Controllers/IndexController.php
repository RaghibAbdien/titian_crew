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
        $notifs = Notification::join('crews', 'notifications.id_crew', '=', 'crews.id_crew')
        ->select('notifications.*', 'crews.nama_crew')
        ->get();
        $NotifNotRead = Notification::where('is_read', false)->count();
        return view('index', compact('jmlhCrew','jmlhLokasi','notifs', 'NotifNotRead'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
