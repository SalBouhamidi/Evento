@extends('layout.navbar')
@section('content')

<section class="container">
<h3>here's all the categories</h3>
<div class="d-flex flex-wrap justify-content-between">
@foreach($categories as $category)

<div class="card text-dark bg-static mb-3" 
            style="width: 18rem;">
        <div class="card-header category text-light fw-semibold">Category</div>
        <div class="card-body category">
            <h5 class="card-title text-light">{{$category->name}}</h5>
            <p class="card-text"></p>

           <div class="d-flex gap-2">
                    
                        <form action="{{route('destroy',$category->id)}}" method="post">
                            @csrf
                            @Method('DELETE')
                            <button type="submit" class="text-light btn-delete rounded  border-0 px-2 py-2 mb-5" >
                            <i class="fa-solid fa-trash "></i>
                        </button>
                        </form>

                                            <!-- Button trigger modal -->
                    <button type="button" class="text-light btn-update rounded  border-0 px-2  mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal{{$category->id}}">
                    <i class="fa-solid fa-pen-to-square"></i>                        
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <form action="{{route('update',$category->id)}}" method="post">
                                    @csrf
                                    @Method('PUT')
                                            <div class="mb-3">
                                                    <label  class="form-label fw-semibold">Category's Name</label>
                                                    <input type="text"  name="category" value="{{$category->name}}" class="form-control" >
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
@endforeach

</section>

@endsection('content')
<style>
    .category{
        background: rgba(248, 64, 208, 1) !important;
    }
    .btn-delete, .btn-update{
        background:#4B0082;
    }
    .btn-delete{
        height:60% !important;
    }
</style>
