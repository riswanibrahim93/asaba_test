@extends('layout.app')
@section('content')
<!-- content -->
<div class="content">
  <div class="container">
    <div class="judul">
      <h4><strong>Collective</strong></h4>
      <div class="text-right">
        <a onclick="tambahOrang()" class="btn button-tampil center">+ Tambah Orang</a>
      </div> 
      <input type="text" id="id-collective" hidden="" value="1">     
    </div>
    @forelse($collective as $coll)
    <div class="form-row">
      <div class="form-group col-sm-3">
        <input type="text" name="nama_collective" class="form-control" id="nama_collective" readonly required placeholder="Nama Collective" value="{{$coll->nama_collective}}">
      </div>
    </div>
    <div>
        <span class="text-secondary" style="font-size: 10px;">Minimal pembelian 40.000, Diskon 30% (Max 30.000) <p>Ongkir 5.000</p></span>
    </div>
    <hr style="background-color: rgb(91, 159, 85); height: 5px;">

    <div class="text-right mb-5">
      <a href="{{ route('pesanSekarang', $coll->id) }}" class="btn button-pesan center">Pesan Sekarang</a>
      <!-- <button type="button" onclick="pesanSekarang()" class="btn button-tampil center">Pesan Sekarang</button> -->
    </div> 
    <div class="isi-collective">
      @foreach($coll->collective_detail as $detail)
      <div class="form-row mt-2"> 
        <div class="form-group col-sm-4" id='id{{$detail->id}}}'>
          <form action="{{route('pilih-menu-collective')}}" method="POST">
            @csrf
            <input type="text" class="form-control" name="namaCollective" hidden value="{{$coll->nama_collective}}">
            <input type="text" class="form-control" name="username" readonly id="username" value="{{$detail->nama}}">
            <h6><strong>Total: {{$detail->total}}</strong></h6>
            <div class="mt-3">
              <button class="btn button-beli center" style="font-size: 10px;">+ Tambah Menu</button>
            </div>
          </form>
        </div>        
        <div class="form-group col-sm-8">
          <div class="row isi-menu-{{$detail->id}}}">

            @foreach($collective_detail_menu as $menu)
              @if($menu->collective_detail_id == $detail->id)
              <div class="col-sm-3">
                <div class="card" id="card" style="width: 12rem;">
                  <div class="all" id="all">
                    <img src="{{$menu->menu->Gambar}}" class="card-img-collective" alt="...">
                    <div class="card-body text-center">
                      <h6 class="card-title text-center font">{{$menu->menu->Nama}}({{$menu->jumlah}})</h6>
                      <div class="row">
                        <div class="col-sm-6 card-text text-center">
                          <h6 class="font">Harga</h6>
                          <h6 class="font" id="harga"> 
                            {{$menu->menu->Harga}}
                          </h6>
                        </div>
                        <div class="col-sm-6">
                          <h6 class="font">Subtotal</h6>
                          <h6 class="font" style="color: red">{{$menu->subtotal}}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            @endforeach

          </div>          
        </div>        
      </div>
      @endforeach
    </div>
    @empty
    <div class="form-row">
      <div class="form-group col-sm-3">
        <input type="text" name="nama_collective" class="form-control" id="nama_collective" required placeholder="Nama Collective" value="">
      </div>
    </div>
    <hr style="background-color: rgb(91, 159, 85); height: 5px;">
    <div class="isi-collective">  
           
    </div>
    @endforelse
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    console.log($('#id-collective').val())
  });
  function tambahOrang(){
    let isiColective = $('.isi-collective');
    let idColective = $('#id-collective').val();
    let namaCollective = $('#nama_collective').val();
    let text = `<div class="form-row mt-2"> 
          <div class="form-group col-sm-4" id='id${idColective}'>
            <form action="{{route("pilih-menu-collective")}}" method="POST">
              @csrf
              <input type="text" class="form-control" name="namaCollective" hidden value="${namaCollective}">
              <input type="text" class="form-control" name="username" required id="username" placeholder="Username">
              <div class="mt-3">
                <button class="btn button-beli center" style="font-size: 10px;">+ Tambah Menu</button>
              </div>
            </form>
          </div>        
          <div class="form-group col-sm-8">
            <div class="row isi-menu-${idColective}"> 
            </div>          
          </div>
        </div>`;
    console.log(namaCollective);
    if(namaCollective == ""){
      alert("Nama Collective Kosong!");
    }
    else{
      isiColective.append(text);
      idColective_baru = parseInt(idColective)+1;
      $('#id-collective').val(idColective_baru);
      $('#nama_collective').attr('readonly', true);
    }
  }
</script>

<!-- content -->
@endsection