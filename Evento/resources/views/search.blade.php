@extends('layout.navbar')
@section('content')

<section class="container">
    <h2>search results</h2>
    @foreach($results as $result)

    <!-- @if(is_null($result))
        <p>No event has this name please try again</p>
    @else -->
    <div class="card mb-3 h-50 mt-5" style="width: 32rem;">
        <div class="card-body">
        <img src="{{asset('storage/'.$result->image)}}" class="card-img-top img-fluid" alt="...">
            <a href="" class="text-light btn-category rounded border-0 px-2 py-2 mt-5 text-decoration-none">{{$result->categorie->name}}</a>
            <h5 class="card-title mt-5">{{$result->name}}</h5>
            <p class="card-text">{{$result->description}}</p>
            <div class="d-flex justify-content-between">
                <a href="{{route('details',$result->id)}}" class="text-light btn-popular rounded border-0 px-2 py-2 mb-5 text-decoration-none">View more details</a>
                <a class="text-light btn-popular rounded border-0 px-4 py-2 mb-5 text-decoration-none">Get my ticket</a>
            </div>
        </div>
    </div>
    <!-- @endif -->
    @endforeach


    <h2>Categories:</h2>

    @if(session('ErrorMessage'))
            <div class="alert alert-danger" role="alert">
                There's no event yet in this category
            </div>
        @endif
    <div class=" w-100 d-flex gap-2 flex-wrap">
       
    @foreach($categories as $category)
    <form action="{{route('categorysearch',$category->id)}}" method="get">
        <input type="hidden" name="category" value="{{$category->id}}">
        <button class="text-light btn-popular rounded border-0 px-4 py-2 mb-5" type="submit">{{$category->name}}</button>
    </form>
    @endforeach
    </div>
</section>





<style>
    .btn-popular,.card-header
{
        background: rgba(248, 64, 208, 1);
    }
    .btn-popular:active {
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