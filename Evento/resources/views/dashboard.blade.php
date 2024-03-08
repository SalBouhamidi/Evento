@extends('layout.navbar')
@section('content')

<section class="container-fluid mt-4">
<!-- <h1>hey admin</h1> -->
<button class="btn btn-primary  mb-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">More actions</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    ...
  </div>
</div>

    <h3>Statistics</h3>
<div>

        <div class="card text-white bg-primary mb-3" 
            style="max-width: 18rem;">
        <div class="card-header">statistiques</div>
        <div class="card-body">
            <h5 class="card-title">Primary card title</h5>
            <p class="card-text">Some quick example [.. truncated content ..]</p>
        </div>
        </div>
</div>

<h3>Pending Events</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Event's Name</th>
      <th scope="col">Description</th>
      <th scope="col">Categorie</th>
      <th scope="col">Place</th>
      <th scope="col">Created By</th>
      <th scope="col"> Status of validation </th>
      <th scope="col"> Validate </th>

    </tr>
  </thead>
  <tbody>
    @foreach($events as $event)

    <tr>
      <th scope="row">{{$event->name}}</th>
      <td>{{$event->description}}</td>
      <td>{{$event->categorie->name}}</td>
      <td>To figure it out</td>
      <td>{{$events[0]->user->name}}</td>
      <td>
      <button href="" class="text-light btn-pending rounded border-0 px-2 py-2  me-2 text-decoration-none"><i class="fa-solid fa-spinner"></i> Pending</button>
      </td>
      <td>  
        <a href="{{route('validation',$event->id)}}" class="text-light btn-active rounded border-0 px-2 py-2 mb-2 me-2 text-decoration-none"><i class="fa-solid fa-globe"></i> Activate</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>

</section>
<style>
    .btn-pending{
        background-color:#DC143C;
    }
    .btn-active{
        background-color:#90EE90;
    }
    .btn-active:active{
        color:#90EE90 !important;
        background:rgb(255,255,255);
    }
    .btn-popular{
        background: rgba(248, 64, 208, 1);
    }
</style>

@endsection