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
                  
                </li>
              </ul>
              <div class="d-flex">
                <button onCLick="window.print();set_voucher_print();" id="button-print" class="button-tampil">Print Pesanan</button>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container">
        <div class="card">
          <div class="card-header">
            Collective E-Food
          </div>
          <div class="card-body">
            <h5 class="card-title">Pesanan ({{$data['nama_collective']}})</h5>
            <div class="row">
          <div class="col-sm-8">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Nama</th>
                  <th scope="col">Pesanan</th>
                  <th scope="col">Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  for ($i=0; $i < count($data['nama']); $i++) { 
                ?>
                  <tr>
                    <td><?php echo $data['nama'][$i]; ?></td>
                    <td style="font-size: 12px;">
                      <?php 
                        for ($j=0; $j < count($data['pesanan'][$i]['nama']); $j++) { 
                          echo $data['pesanan'][$i]['nama'][$j].' ('.$data['pesanan'][$i]['jumlah'][$j].') '.$data['pesanan'][$i]['harga'][$j]; 
                      ?> 
                      <br> 
                      <?php 
                        }
                      ?>
                    </td>
                    <td><?php echo $data['subtotal'][$i]; ?></td>
                  </tr>

                <?php 
                  }
                ?>
                <tr>
                  <th></th>
                  <th></th>
                  <th><?php echo $data['total']; ?></th>
                </tr>
              </tbody>
            </table>
            
            <hr>
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Diskon: <?php echo $data['diskon']; ?></th>
                  <th scope="col">Ongkir: <?php echo $data['ongkir']; ?></th>
                  <th scope="col">Total: <?php echo $data['total']-$data['diskon']+$data['ongkir']; ?></th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="col-sm-4">
            <div class="card text-center">
              <table class="table">
                <thead class="thead-dark">
                  <th scope="col">Nama</th>
                  <th scope="col">Bayar</th>
                </thead>
                <tbody> 
                  <?php 
                    for ($i=0; $i < count($data['nama']); $i++) { 
                  ?>                   
                  <tr>
                    <td><?php echo $data['nama'][$i]; ?></td>
                    <td><?php echo $data['bayar'][$i]; ?></td>
                  </tr>
                  <?php 
                    }
                  ?>
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
          </div>
        </div>
      </div>  
    </div>


    
  </body>
</html>