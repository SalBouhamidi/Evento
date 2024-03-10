@extends('layout.navbar')
@section('content')
<!-- <h1>test</h1> -->

<section class='heresection mb-4'>
<div id="carouselExampleDark" class="carousel carousel-dark slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="{{asset('images/event.jpg')}}" class="d-block w-100 img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block mb-5 h-50">
        <h1 class="text-light mb-5">Welcome to <span class="spanto">Evento</span></h1>
        <p class="text-light fw-bold">Some representative placeholder content for the first slide.</p>
        <button class=" text-light btn-popular rounded border-0 px-3 py-2 me-3">Available Events</button>
        <button class=" text-light btn-popular rounded  border-0 px-2 py-2">Explore categories</button>
      </div>

    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="..." class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>

<section class="Events section container">
    <button class="text-light btn-popular rounded  border-0 px-2 py-2 mb-5">Available Events</button>

    <!-- Button trigger modal -->
          <button type="button" class="text-light btn-popular rounded  border-0 px-2 py-2 mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add your Event
          </button>
          @if(session('role_id')== 3)
            <a  href="{{route('event')}}" type="button" class="text-light text-decoration-none btn-popular rounded  border-0 px-2 py-2 mb-5">
            Mes Evenements
          </a>
          @endif

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
              <div class="modal-content ">
                <div class="modal-header">
                  <h1 class="modal-title fs-5 " id="exampleModalLabel">Adding new event</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="{{route('createEvent')}}" method="post">
                      @csrf
                      <div class="mb-3">
                        <label  class="form-label fw-semibold">Name of your Event</label>
                        <input type="text"  name="name" class="form-control" >
                      </div>

                      <div class="mb-3">
                        <label  class="form-label fw-semibold">Description</label>
                        <input type="text" name="description" class="form-control" >
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
                        <label  class="form-label fw-semibold">City</label>
                        <select name="city_id" class="w-100 py-2"id="status_auto">
                        @foreach($cities as $city)
                            <option name="city_id" value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                        </select>
                      </div>

                      <div class="mb-3">
                        <label  class="form-label fw-semibold">Address</label>
                        <input type="text" name="address" class="form-control" >
                      </div>

                      <div class="mb-3">
                        <label  class="form-label fw-semibold">Date and Time of your Event</label>
                        <input type="datetime-local" name="date" class="form-control" >
                      </div>

                      <div class="mb-3">
                        <label  class="form-label fw-semibold">Image</label>
                        <input type="file" name="image" class="form-control" >
                      </div>

                      <div class="mb-3">
                        <label  class="form-label fw-semibold">choose your reservation method</label>
                          <select name="status_auto" class="w-100 py-2"id="status_auto">
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

    
<div class="d-flex flex-wrap w-100 justify-content-between">
    @foreach($events as $event)
    <div class="card mb-3 h-50" style="width: 32rem;">
        <img src="{{asset('storage/'.$event->image)}}" class="card-img-top img-fluid" alt="...">
        <div class="card-body">
            <a href="" class="text-light btn-category rounded border-0 px-2 py-2 text-decoration-none">{{$event->categorie->name}}</a>
            <h5 class="card-title mt-5">{{$event->name}}</h5>
            <p class="card-text">{{$event->description}}</p>
            <div class="d-flex justify-content-between">
                <a href="{{route('details',$event->id)}}" class="text-light btn-popular rounded border-0 px-2 py-2 mb-5 text-decoration-none">View more details</a>
                <a class="text-light btn-popular rounded border-0 px-4 py-2 mb-5 text-decoration-none">Get my ticket</a>
            </div>
        </div>
    </div>
    @endforeach
  </div>

<div>
  <!-- {{$events->links()}} -->
  </div>



</section>

<style>
    .btn-popular, .btn-delete{
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

</style>







@endsection('content')
