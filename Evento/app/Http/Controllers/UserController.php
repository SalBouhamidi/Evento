<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Categorie;
use App\Models\Ville;
use App\Models\Reservation;
use App\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::all();
        $role = Role::all();
        return view('tableUser', compact(['users','role']));
    }
    public function updateRole($id,Request $request){
        $userfinder = User::find($id);
        // dd($userfinder);
        $userfinder->role_id = $request->role_id;
        $userfinder->save();
        return redirect()->back()->with('success', 'Role has been updated');
    }



    public function EventsInfo(){
        $events = Event::where('status_validation', '0')->get();
        $satisticsReservations = Reservation::all()->count();
        $satisticsEvent = Event::all()->count();
        $satisticsUser = User::all()->count();
        $satisticsOrganisators = User::Where('role_id','2')->count();
        // dd($satisticsReservations);
        return view('dashboard', compact(['events', 'satisticsReservations', 'satisticsUser', 'satisticsEvent', 'satisticsOrganisators']));
    }
    public function acceptingEvent($id){
        // dd('text');
        
        $Event= Event::find($id);
        $Event->status_validation = '1';
        $Event->save();
        $userId= session('user_id');
        $UserRole = User::find($userId);
        $UserRole->role_id = 2;
        $UserRole->save();
        // dd($UserRole->role_id);
        return redirect()->back();
    }



    public function category(Request $request){
        $category = new Categorie();
        $category->name = $request->category;
        $category->save();
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
