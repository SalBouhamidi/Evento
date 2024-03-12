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
        <td>{{$FindEvent->tickets[0]->name}}</td>
        <td>  
        <a href="" class="text-light btn-active rounded border-0 px-2 py-2 mb-2 me-2 text-decoration-none"><i class="fa-solid fa-check"></i> Accept</a>
        </td>

        </tr>

    @endforeach

    
    
  </tbody>
</table>
</section>
<style>
  .btn-active{
        background-color:#90EE90;
    }
    .btn-active:active{
        color:#90EE90 !important;
        background:rgb(255,255,255);
    }
</style>


@endsection('content')