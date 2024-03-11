@extends('layout.navbar')
@section('content')

<section class="container">
<h2>Your Ticket is available : </h2>
<p class="fw-bold">Ps: You might not see your ticket again,Please take screenshot of your Ticket</p>
<div class="card">
  <div class="card-body">
    <h3 class="text-light text-center">Welcome to Even<span class="spanto">to</span></h3>
    <p class=" fw-semibold text-light">Tickets reserved by: {{$UserFinder->name}}</p>
    <p class=" fw-semibold text-light">Reserved Tickets number: {{$quantity}}</p>
    <p class=" fw-semibold text-light">Tickets Type: {{$typeofticket->name}}</p>
    <p class=" fw-semibold text-light">Price per Unit: {{$typeofticket->price}} Dh</p>

    <p class=" fw-semibold text-light">Event's name: {{$Event->name}}</p>
    <p class=" fw-semibold text-light">Reservation number: {{$objpivot->reservation_id}}</p>

  </div>
</div>
</section>

<style>
    .card-body{
        background:rgba(29, 9, 56, 1);
    }
    .spanto{
        color:rgba(248, 64, 208, 1);
      }
</style>



@endsection('content')
