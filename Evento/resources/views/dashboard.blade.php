@extends('layout.navbar')
@section('content')

<section class="container-fluid mt-4">
<!-- <h1>hey admin</h1> -->
                    <!-- Button trigger modal -->
                    <button type="button" class=" text-light btn-popular fw-bold rounded border-0 px-4 py-2  mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add category
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <form action="{{route('category')}}" method="post">
                                    @csrf
                                            <div class="mb-3">
                                                    <label  class="form-label fw-semibold">Category's Name</label>
                                                    <input type="text"  name="category" class="form-control" >
                                            </div>
                                    <button type="submit" class="text-light btn-popular rounded  border-0 px-5 ms-2 py-2 mb-5">Submit</button>


                                </form>


                            
                            </div>
                        </div>
                    </div>
                    </div>

<button class="btn btn-popular  text-light px-4 py-2 mb-1 fw-bold " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">More actions</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-light" id="offcanvasRightLabel">More actions for you</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    ...
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav d-flex flex-column ">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="{{route('index')}}">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="{{route('dashbordusers')}}">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Events</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
  </div>
</div>



    <h3>Statistics</h3>
<div class="d-flex gap-3 ms-4">

        <div class="card text-white mb-3" 
            style="max-width: 18rem;">
        <div class="card-header fw-semibold">Number of reservations:</div>
        <div class="card-body">
            <h5 class="card-title">Here's the Total number of reservations:</h5>
            <p class="card-text">{{$satisticsReservations}}</p>
        </div>
        </div>

        <div class="card text-white mb-3" 
            style="max-width: 18rem;">
        <div class="card-header fw-semibold">Number of Events:</div>
        <div class="card-body">
            <h5 class="card-title">Here's the Total number of events:</h5>
            <p class="card-text">{{$satisticsEvent}}</p>
        </div>
        </div>

        <div class="card text-white mb-3" 
            style="max-width: 18rem;">
        <div class="card-header fw-semibold">Number of Users:</div>
        <div class="card-body">
            <h5 class="card-title">Here's the Total number of users:</h5>
            <p class="card-text">{{$satisticsUser}}</p>
        </div>
        </div>

        <div class="card text-white mb-3" 
            style="max-width: 18rem;">
        <div class="card-header fw-semibold">Number of Event Organisators:</div>
        <div class="card-body">
            <h5 class="card-title">Here's the Total number of organisators:</h5>
            <p class="card-text">{{$satisticsOrganisators}}</p>
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
    .btn-popular, .card-header, .card-body{
        background: rgba(248, 64, 208, 1);
    }
    .btn-popular:active, .btn-popular:hover{
        background:rgb(255,255,255);
        color:rgba(248, 64, 208, 1) !important;
    }
    .offcanvas-body, .offcanvas-title, .card-body:hover{
        background:rgba(29, 9, 56, 1);
    }
</style>

@endsection