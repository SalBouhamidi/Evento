<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <title>Document</title>
</head>
<body>
      <nav class="navbar navbar-expand-lg ">
          <div class="container-fluid ms-5">
              <a class="navbar-brand fw-bold text-light me-5" href="#">Even<span class="spanto">to</span></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              <div class="collapse navbar-collapse me-5" id="navbarSupportedContent">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                          <li class="nav-item ">
                            <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                          </li>
                          <li class="nav-item ">
                            <a class="nav-link active text-light" aria-current="page" href="#">Add Event</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-light" href="#">About us</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link disabled text-light" aria-disabled="true">Disabled</a>
                          </li>
                        </ul>
                        <form class="d-flex" role="search" action ="{{url ('/search')}}" type="get">
                            <input class="form-control me-2" type="search" id="myInput" name="search"placeholder="Search by Event name" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>

                        <div class="dropdown">
                            <button class="btn text-light dropdown-toggle ms-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Profil
                            </button>
                            <ul class="dropdown-menu">
                              <form action="{{route ('logout')}}" method="post">
                                @csrf
                              <li><button class="dropdown-item" href="" type="submit">logout</button></li>
                            </form>
                              <li><a class="dropdown-item " href="#">Another action</a></li>
                              <li><a class="dropdown-item " href="#">Something else here</a></li>
                            </ul>
                      </div>
              </div>
          </div>
        </nav>


        @yield('content')

 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.6/sweetalert2.min.js" integrity="sha512-RJQj9OXEQyrPPOxSPNIXcRi61EGHulbS/SzuXw1nAyvBwYE6782rxLm/G6OKB51igh5eBoT8AUU2+K1gJxXatw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
      .navbar{
        background-color: rgba(29, 9, 56, 1);
      }
      .spanto{
        color:rgba(248, 64, 208, 1);
      }
      .dropdown-menu{
        background-color: rgba(29, 9, 56, 1);

      }
      .dropdown-item{
        color:rgba(248, 64, 208, 1);

      }
    </style>

</body>
</html>