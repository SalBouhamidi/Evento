@extends('layout.navbar')
@section('content')

<h3>Users Table</h3>
<section class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Role id </th>
      <th scope="col">Update Role</th>
      <th scope="col">Suspend his accounts</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
        <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role_id}}</td>
        <th scope="row">
            <div class="d-flex gap-2">

            <form action="{{route('updaterole',$user->id)}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="role_id" value="1">
                <button type="submit"  class="btn btn-admin">A</button></form>
            </form>

            <form action="{{route('updaterole',$user->id)}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="role_id" value="2">
                <button type="submit"  class="btn btn-organisateur">O</button></form>
            </form>

            <form action="{{route('updaterole',$user->id)}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="role_id" value="3">
                <button type="submit"  class="btn btn-user">U</button></form>
            </form>
            </div>

        </th>
        <th class="row">
        <button type="button" class="btn btn-danger">Suspend account</button>

        </th>

        </tr>
    
   @endforeach
    
  </tbody>
</table>
</section>

<style>
    .btn-user{
        background:#FA8072;
    }
    .btn-admin{
        background:#C71585;
    }
    .btn-organisateur{
        background:#FFC72C;
    }
</style>



@endsection('content')