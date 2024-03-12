@extends('layout.navbar')
@section('content')

<section class="container">
    <h3>sorted by category</h3>

    @foreach($events as $event)

    <div class="card mb-3 h-50 mt-5" style="width: 32rem;">
        <div class="card-body">
        <img src="{{asset('storage/'.$event->image)}}" class="card-img-top img-fluid" alt="...">
            <a href="" class="text-light btn-category rounded border-0 px-2 py-2 mt-5 text-decoration-none">{{$event->categorie->name}}</a>
            <h5 class="card-title mt-5">{{$event->name}}</h5>
            <p class="card-text">{{$event->description}}</p>
            <div class="d-flex justify-content-between">
                <a href="{{route('details',$event->id)}}" class="text-light btn-popular rounded border-0 px-2 py-2 mb-5 text-decoration-none">View more details</a>
                <a class="text-light btn-popular rounded border-0 px-4 py-2 mb-5 text-decoration-none">Get my ticket</a>
            </div>
        </div>
    </div>
    @endforeach
    </section>

    @endsection('content')