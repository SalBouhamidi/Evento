<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Categorie;
use App\Models\Ticket;
use App\Models\Ville;

use Illuminate\Support\Carbon;
// use Carbon\Carbon;





class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Categorie::get();
        // $events = Event::all();
        $events = Event::where('status_validation', '1')->get();
        return view('home', compact(['events', 'categories']));
    }

    public function eventDetails($id){
        $eventdetails = Event::find($id);
        $city= Ville::where('id' , $eventdetails->places[0]->ville_id)->first();
        $date = Carbon::parse($eventdetails->date);
        $ticketsofEvent = Ticket::where('event_id', $eventdetails->id)->get();
        return view('detailsevent', compact('eventdetails','date', 'city','ticketsofEvent'));
    }

    public function reservations
    /**
     * Show the form for creating a new resource.
     */
    public function viewMyEvent()
    {
        $sessionId = session('user_id');
        // dd($sessionId);
        $categories= Categorie::get();
        $Myevents = Event::where('user_id',$sessionId)->get();
        $totalMyEvent = Event::where('user_id',$sessionId)->count();
        $AccptedEvent = Event::where('user_id',$sessionId)
        ->where('status_validation', '1')->count();
        $PendingEvent = Event::where('user_id',$sessionId)
        ->where('status_validation', '0')->count();

        // dd($PendingEvent);
        return view('myevent',compact('Myevents','categories','totalMyEvent','AccptedEvent','PendingEvent'));

    }

    public function addTicket(Request $request, $id){
        $eventId = Event::find($id);
        $objectTicket = new Ticket;
        $objectTicket->name = $request->name;
        $objectTicket->quantity = $request->quantity;
        $objectTicket->price = $request->price;
        $objectTicket->event_id = $eventId->id;
        // dd($objectTicket);
        $objectTicket->timestamps = false;
        $objectTicket->save();
        return redirect()->back();

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
        $objectModel->status_validation = 0;
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

        return redirect()->route('event');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getEventById = Event::find($id);
        // dd($getEventById->id);
        $getEventById->delete();
        return redirect()->back();
    }
}
