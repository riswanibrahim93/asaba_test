@extends('layout.app')
@section('content')
<!-- content -->
<div class="content">
  <div class="container">
    <div class="judul">
      <h4><strong>Menu</strong></h4>
      <div class="text-right">
        <a href="{{ route('collective') }}" class="btn button-collective center">Collective</a>
      </div>      
    </div>
    <!-- start card produk -->
    <div class="produk mt-4">
      <div id="card_produk">
        <div class="row" id="all_produk">
        	@foreach($menus as $menu)

            <div class="col-sm-3 mt-3">
              <div class="card" id="card" style="width: 18rem;" onclick="">
                <div class="all" id="all">
                  <img src="{{$menu->Gambar}}" class="card-img-top" alt="...">
                  <div class="card-body text-center">
                    <h6 class="card-title text-center font">{{$menu->Nama}}</h6>
                    <h6 class="card-text text-center font font-rp" id="harga">Rp. 
                      {{$menu->Harga}}
                    </h6>
                    <a class="btn button-tampil center" onclick="keranjang('{{$menu->id}}', '{{$menu->Nama}}','keranjang')">+ Keranjang</a>
                    <a href="{{ route('checkOut') }}" onclick="keranjang('{{$menu->id}}', '{{$menu->Nama}}','beli')" class="btn button-beli center">Beli</a>
                  </div>
                </div>
              </div>
            </div> 
            @endforeach
        </div>
      </div>
    </div>
    <!-- end card produk -->
  </div>
</div>
<!-- content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
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