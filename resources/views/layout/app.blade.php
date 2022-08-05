<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/style.css') !!}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>@yield('title', 'Asaba Food')</title>
  </head>
  <body>
    <div class="garis-atas">    
    </div>

    <div class="nav-bar">
      <div class="shadow p-3 mb-5 bg-body rounded">
        <div class="container contain">
          <nav class="navbar navbar-expand-lg navbar-white bg-white">
            <a class="nav-link me-5" href="{{ route('pilih-menu') }}"><img class="logo-otten-1" src="https://cdn.kibrispdr.org/data/757/logo-makan-png-5.png"></a>            
            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                <li class="nav-item item-search">
                  <div class="input-group search">
                    <span class="input-group-text search" id="basic-addon1"><img class="logo-loupe" src="{!! asset('assets/img/loupe.png') !!}"></span>
                    <form action="" method="">
                      <input type="text" name="cari" class="form-control search input" placeholder="Cari menu..." aria-label="Username" aria-describedby="basic-addon1">
                    </form>
                  </div>
                </li>
              </ul>
              <div class="d-flex">
                <a class="nav-link" href="{{ route('checkOut') }}">
                  <img class="logo-otten-1" src="https://img1.pngdownload.id/20171220/skq/shopping-cart-png-5a3a8fc8964401.8796450215137873366155.jpg">
                  <span class="badge badge-danger" id="pesanan"></span>                 
                </a>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>

    @yield('content')

    
    <div class="footer mt-5">
      
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
        pesanan();
      });
      function pesanan(){
        $.ajax({
          type:'GET',
          url:"{{ route('getPesanan') }}",
          success:function(data){
            $('#pesanan').html(data.length);
          }
        });   
      }
      
    </script>

    
  </body>
</html>