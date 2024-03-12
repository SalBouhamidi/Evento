<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Categorie;
use App\Models\Ticket;
use App\Models\Ville;
use App\Models\Reservation;
use App\Models\Place;
use App\Models\User;
use App\Models\Reserved_tickte;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;






class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories= Categorie::get();
        $cities = ville::get();
        $events = Event::where('status_validation', '1')->paginate(6);
        return view('home', compact(['events', 'categories','cities']));
    }

    public function eventDetails($id){
        $eventdetails = Event::find($id);
        $city= Ville::where('id' , $eventdetails->places[0]->ville_id)->first();
        $date = Carbon::parse($eventdetails->date);

        $ticketsofEvent = Ticket::where('event_id', $eventdetails->id)
        ->get();
        $ticketsreserved= Reserved_tickte::where('ticket_id', $ticketsofEvent[0]->id)
        ->where('validation', 1)->count();
        // dd($ticketsreserved);
        $seats= $ticketsofEvent[0]->quantity - $ticketsreserved;

        return view('detailsevent', compact('eventdetails','date', 'city','ticketsofEvent', 'seats'));
    }


    public function reservationManuelleInfo($id, Request $request){
        $FindEvent = Event::find($id);
        // dd($FindEvent->tickets[0]->id);
        $DataReservation= DB::table('users')
        ->join('events', 'users.id', '=', 'events.user_id')
        ->join('tickets', 'tickets.event_id', '=', 'events.id')
        ->join('reserved_ticktes', 'reserved_ticktes.ticket_id', '=' ,'tickets.id')
        ->join('reservations', 'reserved_ticktes.reservation_id', '=', 'reservations.id')
        ->where('reservations.validation', '0')
        ->select('events.*', 'tickets.name as Tname', 'reservations.id', 'users.name' )
        ->get();  
        return view('reservationManuelle', compact('DataReservation', 'FindEvent'));
    }
    public function acceptReservation($id){
        $reservation = Reservation::where('id', $id)->update(['validation' => 1]);
        $reservedticket = Reserved_tickte::where('reservation_id', $id)->update(['validation' => 1]);
        return redirect()->back()->with('success', 'the ticket has been updated');

    }

    public function reservation($id, Request $request){

        $FindEvent = Event::find($id);
        $quantity= $request->quantity;
        $ticketsofEvent = Ticket::where('event_id', $FindEvent->id)->get();
        $reserved = Reserved_tickte::where('ticket_id',$ticketsofEvent[0]->id)->count();
        $seats= $ticketsofEvent[0]->quantity - $reserved;
        // dd($quantity);
        if($quantity > $seats){
            return redirect()->back()->with('errorReservation', 'You can not reserved this quantity, avialable seats are :'. $seats);
        }else if($quantity == $seats || $quantity< $seats)
        {
                    $reservationobj = new Reservation;
                    $userId = session('user_id');
                    $reservationobj->user_id = $userId;

                    if($FindEvent->status_auto == 1){
                        $reservationobj->validation= 1;
                    }elseif($FindEvent->status_auto == 0){
                        $reservationobj->validation= 0;
                    }
                    $reservationobj->save();
                    $reservId = $reservationobj->id;
                    $i= 0;
                    for($i<0; $i<$quantity; $i++){
                    $objpivot = new Reserved_tickte;
                    $objpivot->ticket_id = $request->ticketId;
                    $objpivot->reservation_id= $reservId;
                    if($FindEvent->status_auto == 1){
                                $objpivot->validation= 1;
                    }elseif($FindEvent->status_auto == 0){
                        $objpivot->validation= 0;
                    }
                    $objpivot->save();
                    }
                    if($objpivot->validation == 1){
                        $UserFinder = User::Find($userId);
                        $typeofticket = Ticket::find($objpivot->ticket_id);
                        $Event = Event::find($typeofticket->event_id);
                    return view('generatedticket', compact('UserFinder', 'quantity', 'objpivot', 'typeofticket', 'Event'));
                    }elseif($objpivot->validation == 0){
                        return redirect()->back()->with('WaitingforOrg', 'Your reservation is on process, the organisator will accept it as soon as possible.
                                                            Thank you for being patient');
                    }


        
        }
    }



    public function ticketGenerated(){
        return view('generatedticket');
    }
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
        $findTicket = Ticket::where('event_id', $eventId->id)->first();
        // dd(is_null($findTicket));

        if(is_null($findTicket)){
            $eventId = Event::find($id);
            $objectTicket = new Ticket;
            $objectTicket->name = $request->name;
            $objectTicket->quantity = $request->quantity;
            $objectTicket->price = $request->price;
            $objectTicket->event_id = $eventId->id;
            // $objectTicket->timestamps = false;
            $objectTicket->save();

            return redirect()->back()->with('success', 'ticket added successfully to your event'); 
        }else{
          return redirect()->back()->with('errorMessage', 'you already add ticket to this Event');
        }


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
        $objectModel->save();

        $objectVille= new Ville;
        $objectVille->id = $request->get('city_id');
        // $objectVille->save();

        $objectPlace = new Place;
        $objectPlace->address = $request->get('address');
        $objectPlace->ville_id= $objectVille->id;
        $objectPlace->event_id =$objectModel->id;
        // dd($objectPlace);
        $objectPlace->save();

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
