<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Categorie;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories= Categorie::get();
        // dd($categories->event);
        $events = Event::all();
        // $test= Event::get();
        // dd($events[0]->categorie->name);
        // $arr = [];
        // foreach ($events as $ev){
        //      $arr[] =  $ev->categorie->name;
        // }
        // dd($arr);
        return view('dashboard', compact(['events', 'categories']));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $objectModel= new Event;
        $objectModel->name = $request->name;
        $objectModel->description = $request->description;
        $objectModel->status_validation = 1;
        $objectModel->status_auto = $request->status_auto;
        $objectModel->status = 1;
        $objectModel->date = $request->date;
        $objectModel->categorie_id = $request->get('categorie_id');
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $objectModel->image = $imagePath;
        }
        $objectModel->user_id = session('user_id');       
        // dd($objectModel);
        $objectModel->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     $event= Event::all();
    //     $getEventById = $event->find($id);
    //     // dd($getEventById); 
    //     return redirect()->route('update');
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'name' => 'required',
            'description' => 'required',
            'categorie_id' => 'required',
            'date' => 'required',
            'status_auto' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        $updateEvent = Event::find($id);

        $updateEvent->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'categorie_id' => $request->input('categorie_id'),
            'date' => $request->input('date'),
            'status_auto' => $request->input('status_auto'),
            'name' => $request->input('name'),
            'image' => $imagePath,
        ]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd('test');
        $getEventById = Event::find($id);
        $getEventById->delete();
        return redirect()->back();
    }
}
