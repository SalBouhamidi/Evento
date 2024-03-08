<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Categorie;
use App\Models\Ville;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::all();
        return view('dashboard', compact(['users']));
    }

    public function EventsInfo(){
        $events = Event::where('status_validation', '0')->get();
        // foreach ($events as $event){
        // dd($events);
        return view('dashboard', compact(['events']));
    }
    public function acceptingEvent($id){
        // dd('text');
        $Event= Event::find($id);
        $Event->status_validation = '1';
        $Event->save();
        return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
