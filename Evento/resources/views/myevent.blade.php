@extends('layout.navbar')
@section('content')

<section class="container mt-5 mb-5">
    <div class="d-flex justify-content-between">
        <div class="statistique-event px-3 py-5 rounded">
            <p class="fw-bold text-light h-25">Number of my events: {{$totalMyEvent}}</p>
        </div>

        <div class="statistique-event px-3 py-5 rounded">
            <p class="fw-bold text-light h-25">Number of reservation: 200</p>
        </div>

        <div class="statistique-event px-3 py-5 rounded">
            <p class="fw-bold text-light h-25">Approved Events: {{$AccptedEvent}}</p>
        </div>

        <div class="statistique-event px-3 py-5 rounded">
            <p class="fw-bold text-light h-25">Pending Events: {{$PendingEvent}}</p>
        </div>

    </div>
    <h3 class="mt-3">My events</h3>

</section>
<section class="d-flex container">
<div class="d-flex flex-wrap justify-content-between gap-5">
    @foreach($Myevents as $event)
    <div class="card mb-3 ms-5" style="width: 30rem;">
        <img src="{{asset('storage/'.$event->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <a href="" class="text-light btn-category rounded border-0 px-2 py-2 text-decoration-none">{{$event->categorie->name}}</a>
            <h5 class="card-title mt-5">{{$event->name}}</h5>
            <p class="card-text">{{$event->description}}</p>
            @if($event->status_validation == 1)
                <button class="text-light btn-active rounded border-0 px-2 py-2 mb-2 me-2 text-decoration-none"><i class="fa-solid fa-globe"></i> Active</button>
            @elseif($event->status_validation == 0)
            <button href="" class="text-light btn-pending rounded border-0 px-2 py-2 mb-2  me-2 text-decoration-none"><i class="fa-solid fa-spinner"></i> Pending</button>
            @endif

            @if($event->status_auto == 1)
                <button class="text-light btn-manualv rounded border-0 px-2 py-2 mb-2 text-decoration-none"><i class="fa-solid fa-check"></i> Manual validation</button>
            @endif

            <div class="d-flex justify-content-between">
                <button class="text-light btn-popular rounded border-0 px-2 py-2  mb-5">View more details</button>





                <!-- <button class="text-light btn-popular rounded border-0 px-4 py-2  mb-5">Add/customize tickets</button> -->

                                    <!-- Button trigger modal -->
                    <button type="button" class=" text-light btn-popular rounded border-0 px-4 py-2  mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add/customize tickets
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add and costomize your tickets</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <form action="" method="">
                                    <div class="tickets d-flex gap-2" id="tickets">
                                            <div class=" mb-3">
                                                    <label  class="form-label fw-semibold">Ticket's Name</label>
                                                    <input type="text"  name="name"  class="name" value="" class="form-control" >
                                            </div>
                                            <div class="mb-3">
                                                    <label  class="form-label fw-semibold">Ticket's price</label>
                                                    <input type="number" step="0.01"  name="price" value="" class="form-control" >
                                            </div>
                                            <div class="mb-3">
                                                    <label  class="form-label fw-semibold">Quantity</label>
                                                    <input type="number" step="1" name="quantity" value="" class="form-control" >
                                            </div>

                                            <button type="button" onclick="add()" class="text-light btn-add-ticket rounded  border-0"><i class="fa-solid fa-plus"></i></button>
                                            <button type="button" onclick="remove()" class="text-light btn-remove-ticket rounded  border-0 "> <i class="fa-solid fa-trash"></i> </button>

                                    </div>
                                    <button type="submit" class="text-light btn-popular rounded  border-0 px-5 ms-2 py-2 mb-5">Submit</button>


                                </form>


                            
                            </div>
                        </div>
                    </div>
                    </div>

                    <script >
                        var tickets = document.getElementById('tickets');

                        function add(){
                            var addTicket= document.createElement('input');
                            newField.setAttribute('placeholder','text');
                            newField.setAttribute('placeholder','text');
                            newField.setAttribute('name','text');

                            formfield.appendChild(tickets);



                        }


                    </script>








                    <div class="mt-2 d-flex gap-2">
                    
                        <form action="{{route('deleteevent',$event->id)}}" method="post">
                            @csrf
                            @Method('DELETE')
                            <button type="submit" class="text-light btn-delete rounded  border-0 px-2 py-2 mb-5" >
                            <i class="fa-solid fa-trash "></i>
                        </button>
                        </form>

                         <!-- Button trigger modal -->
                        <button type="button" class="text-light btn-popular rounded  border-0 px-2 py-2 mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal{{$event->id}}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$event->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5 " id="exampleModalLabel">Updating new event</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype='multipart/form-data' action="{{route('updateevent',$event->id)}}" method="post">
                                        @csrf
                                        @Method('PUT')
                                        <div class="mb-3">
                                            <label  class="form-label fw-semibold">Name of your Event</label>
                                            <input type="text"  name="name" value="{{$event->name}}" class="form-control" >
                                        </div>

                                        <div class="mb-3">
                                            <label  class="form-label fw-semibold">Description</label>
                                            <input type="text" name="description" value="{{$event->description}}" class="form-control" >
                                        </div>

                                        <div class="mb-3">
                                            <label  class="form-label fw-semibold">Category</label>
                                            <select name="categorie_id" class="w-100 py-2"id="status_auto">
                                            @foreach($categories as $category)
                                                <option name="categorie_id" value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label  class="form-label fw-semibold">Date and Time of your Event</label>
                                            <input type="datetime-local" name="date" value="{{$event->date}}"class="form-control" >
                                        </div>

                                        <div class="mb-3">
                                            <label  class="form-label fw-semibold">Image</label>
                                            <input type="file" name="image" value="{{$event->image}}" class="form-control" >
                                        </div>

                                        <div class="mb-3">
                                            <label  class="form-label fw-semibold">choose your reservation method</label>
                                            <select name="status_auto" value="{{$event->status_auto}}" class="w-100 py-2"id="status_auto">
                                                <option value="0">Automatic Reservation Validation</option>
                                                <option value="1">Manual Reservation Validation</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="text-light btn-popular rounded  border-0 px-5 ms-2 py-2 mb-5">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>

                    </div>

            </div>
        </div>
    </div>
    @endforeach
  </div>
</section>

<style>
    .btn-popular, .btn-delete, .btn-add-ticket, .btn-remove-ticket{
        background: rgba(248, 64, 208, 1);
    }
    .btn-popular:active, .btn-delete:active {
        background-color:rgba(255, 255, 255, 1);
        color:rgba(248, 64, 208, 1) !important;
    }
    .modal{
      background-color: rgba(29, 9, 56, 1);
    }
    .form-label{
      color: rgba(29, 9, 56, 1);
    }
    .category{
      background-color:rgba(255, 255, 255, 1);
      color:rgba(248, 64, 208, 1) !important;

    }
    .btn-category{
      background-color: rgba(29, 9, 56, 1);
      /* color:rgba(248, 64, 208, 1) !important; */
    }

    .btn-category:hover{
      background-color:rgba(248, 64, 208, 1) !important;
    }
    .btn-active{
        background-color:#90EE90;
    }
    .btn-pending{
        background-color:#DC143C;
    }
    .btn-manualv {
        background-color:#DB7093;
    }
</style>
  

</section>
    

@endsection('content')
 <style>
    .statistique-event{
        background: rgba(248, 64, 208, 1);
    }

    .statistique-event:hover{
        background:rgba(29, 9, 56, 1);
    }
 </style>