@extends('layout.navbar')
@section('content')

<h1>reservation events</h1>

<section class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name of user</th>
      <th scope="col">Event's name</th>
      <th scope="col">Reservation number</th>
      <th scope="col">Quantity</th>
      <th scope="col">Ticket's name</th>
      <th scope="col">Accept</th>
    </tr>
  </thead>
  <tbody>
  @foreach($DataReservation as $reservation)
        <tr>
        <th scope="row">{{$reservation->name}}</th>
        <th scope="row">{{$FindEvent->name}}</th>
        <td>{{$reservation->id}}</td>
        <td>{{$reservation->quantity}}</td>
        <td>{{$FindEvent->tickets[0]->name}}</td>
        <td>hjj</td>

        </tr>

    @endforeach

    
    
  </tbody>
</table>
</section>


@endsection('content')