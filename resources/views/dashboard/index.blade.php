@extends('layout.app')
@section('content')
<!-- content -->
<div class="content">
  <div class="container">
    <div class="judul">
      <h4><strong>Menu</strong></h4>
      <div class="text-right" style="float: right;">
        <div class="card mb-3" style="max-width: 350px;">          
          <h6 class="font" style="text-align: justify; font-size: 10px; padding-right: 10px; padding-left: 10px;">Yuk Cobain, Menu Collective menampung orderan banyak orang, dan Menghitungkan pengeluaran masing-masing setelah didiskon</h6>
        </div>
        <a href="{{ route('collective') }}" class="btn button-collective center">Collective</a>
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
    pesanan();
  });
  function keranjang(id, menu, ket){
    console.log(id);

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }});

    $.ajax({
        type:'POST',
        url:"{{ route('keranjang') }}",
        data:{
          id: id
        },
        success:function(data){
          // console.log(data);
          if(ket != 'beli'){
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
        }
    }); 
    pesanan()
  }
  
</script>

@endsection