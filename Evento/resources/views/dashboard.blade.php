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

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
              <div class="modal-content ">
                <div class="modal-header">
                  <h1 class="modal-title fs-5 " id="exampleModalLabel">Adding new event</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="" method="post">
                      <div class="mb-3">
                        <label  class="form-label fw-semibold">Name of your Event</label>
                        <input type="text" class="form-control" >
                      </div>

                      <div class="mb-3">
                        <label  class="form-label fw-semibold">Description</label>
                        <input type="text" class="form-control" >
                      </div>

                      <div class="mb-3">
                        <label  class="form-label fw-semibold">Category</label>
                        <input type="text" class="form-control" >
                      </div>

                      <div class="mb-3">
                        <label  class="form-label fw-semibold">Date and Time of your Event</label>
                        <input type="datetime-local" class="form-control" >
                      </div>

                      <div class="mb-3">
                        <label  class="form-label fw-semibold">Image</label>
                        <input type="file" name="image" class="form-control" >
                      </div>
                      <button type="submit" class="text-light btn-popular rounded  border-0 px-5 ms-2 py-2 mb-5">Submit</button>
                    </form>
                </div>
              </div>
            </div>
          </div>

    
    <div class="card" style="width: 25rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <div class="d-flex justify-content-between">
                <button class="text-light btn-popular rounded border-0 px-2 py-2 mb-5">View more details</button>
                <button class="text-light btn-popular rounded border-0 px-4 py-2 mb-5">Get my ticket</button>
            </div>


        </div>
    </div>


</section>

<style>
    .btn-popular{
        background: rgba(248, 64, 208, 1);
    }
    .btn-popular:active {
        background-color:rgba(255, 255, 255, 1);
        color:rgba(248, 64, 208, 1) !important;
    }
    .modal{
      background-color: rgba(29, 9, 56, 1);
    }
    .form-label{
      color: rgba(29, 9, 56, 1);
    }
</style>




@endsection('content')
