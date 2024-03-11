@extends('layout.navbar')
@section('content')

<h3 class="ms-3">Welcome to Even<span class="logo">to</span></h3>


<section class="container d-flex gap-4">
    <div class="w-75 event-details ">
        <p class="fw-bold text-light fs-4 text-center">{{$eventdetails->name}}</p>
        <div class="band" style="with:10rem">
            <p class="text-light fw-bold ms-2">{{$eventdetails->categorie->name}}</p>
        </div>
        <div class="bg-sucess ms-2  mb-5">
            <p class="text-light fw-bold ms-2 d-flex gap-3">
            <i class="fa-solid fa-location-dot text-light mt-1"></i>Address: {{$eventdetails->places[0]->address}}, {{$city->name}}</p>
            <p class="text-light fw-bold ms-2 d-flex gap-3"><i class="fa-solid fa-calendar-days mt-1"></i> Date: {{$date->englishDayOfWeek}} {{$date->day}} {{$date->englishMonth}} {{$date->year}}</p>
            <p class="text-light fw-bold ms-2 d-flex gap-3"><i class="fa-solid fa-clock mt-1"></i> Hour: {{$date->hour}}:{{$date->minute}} </p>
            <p class="text-light fw-bold ms-2 d-flex gap-3 "><i class="fa-solid fa-chair  mt-1"></i> Avialable seats : {{$seats}}</p>
        </div>

        <div class="bg-light mb-5 ">
            <p class="bg-light fw-bold">Description: {{$eventdetails->description}}</p>
            <div class="bg-text bg-light">
                <img src="{{asset('storage/'.$eventdetails->image)}}" class="img-fluid bg-light" alt="">
            </div>
        </div>
        
    </div>

    

    <div class="w-25 bg-light border border-light">
         <p class= "fw-bold text-center">Selection des tickets</p>
         <hr class="mb-3">

         <form action="{{route('reservation', $eventdetails->id)}}" method= "post">
            @csrf
            @Method('POST')
         <div class="ticket px-3">
  
            @foreach($ticketsofEvent as $ticket)
                <div class="d-flex ">
                    <p class="fw-semibold text-secondary-emphasis">{{$ticket->name}}: </p> 
                    <p class="fw-semibold text-secondary-emphasis " id="price">{{$ticket->price}}</p> 
                 </div>
                 <div class=" ms-2 d-flex justify-content-between gap-2 mb-3">
                    <button class="btn-add text-light border-0" id="mince"   style="height:2rem"><i class="fa-solid fa-minus" type="button"></i></button>
                    <input class="calculatenumber" style="height:2rem"  type="number" value="0">
                    <button class="btn-remove text-light border-0" id="plus" style="height:2rem" value="1" type="button"><i class="fa-solid fa-plus"></i></button>
                    <input type="hidden" name='ticketId' value="{{$ticket->id}}">
                    <input type="hidden" name='quantity' class="quantity">
                 </div>
            @endforeach

                <hr class="mb-3"> 
                <p class= "fw-bold mb-3"id="Totalprice"></p>

                @if($seats == 0)
                    <p class="text-light btn-soldout rounded  border-0 px-2 py-2 mb-5 ms-4">Sold Out</p>

                @else
                     <button type="submit" class="text-light btn-popular rounded  border-0 px-2 py-2 mb-5">Reserve</button>
                </form>
                @endif

                
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.min.js" integrity="sha512-RJQj9OXEQyrPPOxSPNIXcRi61EGHulbS/SzuXw1nAyvBwYE6782rxLm/G6OKB51igh5eBoT8AUU2+K1gJxXatw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
             


                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                @if(session('errorReservation'))
                    <script>
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "{{ session('errorReservation') }}",
                            showConfirmButton: false,
                            timer: 4000
                        });
                    </script>
                @endif




                 <script>

                
                let mince = document.getElementById('mince');
                let plus = document.getElementById('plus');
                let number = document.getElementsByClassName('calculatenumber')[0];
                let pricetick = document.getElementById('price');
                let totaldisplay = document.getElementById('Totalprice');
                let Tquantity = document.querySelector('.quantity');

                plus.addEventListener('click', function(){
                    number.value = +number.value +1;
                    Tquantity.value = number.value;
                    pricecalculator()
                })
                mince.addEventListener('click', function(){
                    if(number.value > 0){
                        number.value = +number.value -1;
                        Tquantity.value = number.value;
                        pricecalculator()
                    }
                })
                function pricecalculator(){
                    let quantity= parseInt(number.value);
                    let price = parseFloat(pricetick.textContent);
                    let totalprice = quantity * price;
                    totaldisplay.textContent = 'Total price:' + totalprice + 'Dh';
        
                }

            </script>
           
         </div>
    </div>
</section>

<style>
    .logo{
        color: rgba(248, 64, 208, 1);
    }
    .event-details{
        background:rgba(248, 64, 208, 1);
    }
    .band{
        background:rgba(29, 9, 56, 1);
    }
    .btn-add, .btn-remove, .btn-popular{
        background: rgba(248, 64, 208, 1);
    }

    .btn-add:hover, .btn-remove:hover, .btn-popular:hover
    {
        background:rgba(255, 255, 255, 1);
        color:rgba(248, 64, 208, 1) !important;
    }
    .btn-soldout{
        background-color:#DC143C;
    }

</style>



@endsection('content')
