@extends('layout.app')
@section('content')
<!-- content -->
<div class="content">
  <div class="container">
    <div class="judul mb-5">
      <div style="float: left;">
        <h4><strong>Menu Collective ({{$data['nama_collective']}})</strong></h4>
        <h6>Hai {{$data['username']}}!, Silahkan pilih menu favoritmu</h6>
      </div>
      <div style="float: right;">        
        <a class="nav-link" href="{{ route('checkOut-collective', $data['collectiveDetail_id']) }}" >
          <img class="logo-otten-1" src="https://img1.pngdownload.id/20171220/skq/shopping-cart-png-5a3a8fc8964401.8796450215137873366155.jpg">
          <span class="badge badge-danger" id="pesanan-collective"></span>                 
        </a>
      </div>
    </div>
    <br>
    <br>
    <br>
    @include('dashboard.menu')
  </div>
</div>
<!-- content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">

  $( document ).ready(function() {

    collectiveDetailMenu();
    $('.keranjang-pesanan').attr('hidden', true);
    $('.beli').attr('hidden', true);

  });

  function keranjang(id, menu, ket){
    console.log(id);

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }});

    $.ajax({
        type:'POST',
        url:"{{ route('keranjang-collective') }}",
        data:{
          id: id,
          collective_id: {{$data['collectiveDetail_id']}}
        },
        success:function(data){
          console.log(data);
          if(data == 200){
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: menu+' Masuk Keranjang',
            })
          }
          else{
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: menu+' Gagal Keranjang',
            })
          }
        }
    }); 
    collectiveDetailMenu()
  }

  function collectiveDetailMenu(){
    $.ajax({
      type:'GET',
      url:"{{ route('getCollectiveDetailMenu') }}",
      success:function(data){
        $('#pesanan-collective').html(data.length);
      }
    });   
  }
  
</script>

@endsection