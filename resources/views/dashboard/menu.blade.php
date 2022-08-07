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
                <a href="{{ route('checkOut') }}" onclick="keranjang('{{$menu->id}}', '{{$menu->Nama}}','beli')" class="btn button-beli center beli">Beli</a>
              </div>
            </div>
          </div>
        </div> 
        @endforeach
    </div>
  </div>
</div>
<!-- end card produk -->