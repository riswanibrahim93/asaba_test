@extends('layout.app')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Keranjang Kamu</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="cart-list-head">
                    <div class="cart-list-title overflow-auto">                        
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Menu</th>
                                    <th class="text-center" scope="col">Jumlah</th>
                                    <th class="text-center" scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($checkOut as $item)
                                <tr>                                    
                                    <td>
                                        <h5 class="nama mb-2">{{ $item->menu->Nama }}</h5>
                                    </td>
                                    <td class="text-center">
                                        <div>
                                            <button class="btn btn-outline-success" type="button" onclick="keranjang('-',{{$item->menu->id}})" id="button-addon1">-</button>
                                            <input class="text-center border" type="text" id="jml{{$item->id}}" style="width: 10%" value="{{ $item->jumlah }}">
                                            <button class="btn btn-outline-success" type="button" onclick="keranjang('+',{{$item->menu->id}})" id="button-addon1">+</button>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" hidden id="harga{{$item->id}}" value="{{ $item->menu->Harga }}">
                                        <input type="text" hidden id="harga{{$item->id}}" value="{{ $item->menu->Harga }}">
                                        <h5 class="subtotal mb-2" id="sub{{$item->id}}">
                                            {{ $item->menu->Harga*$item->jumlah }}
                                        </h5>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="total-amount">
                    <div class="row">
                        <div class="col-12">
                            <div class="right">
                                <div class="mb-2">Total Keranjang :</div>
                                <div class="row mb-2 mt-2">
                                    <div class="col-sm-6">Total</div>
                                    <div class="col-sm-6 text-right" id="totalKeranjang"></div>
                                </div>
                                <div class="button mt-5 text-center">
                                    <form action="{{ route('beliCollective',$id) }}" method="POST">
                                        @csrf
                                        <input type="text" hidden id="total" name="total">
                                        <button type="submit" class="btn button-tampil" style="width:100% !important" class="btn m-0">Checkout</button>                         
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<div style="margin-bottom: 120px;"></div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    $( document ).ready(function() {
        totalKeranjang();
    });
    

    // update amount di view
    function keranjang(operand, id) {

        let jml = parseInt($('#jml'+id).val());
        let harga = parseInt($('#harga'+id).val());

        if(operand == '-'){
          if(jml > 1){
            jml -= 1;
            $('#jml'+id).val(jml);
          }
        }
        else if(operand == '+'){
          jml += 1;
            $('#jml'+id).val(jml);
        }

        updatePesanan(id, jml, harga);
        totalKeranjang();
    }



    function updatePesanan(id, jml, harga) {
        // Set up csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //update subtotal
        let subtotal = jml*harga;
        $('#sub'+id).html(subtotal);

        $.ajax({
            type: "PUT",
            url: "{{ route('updateCollectiveDetailMenu') }}",
            data: {
                collective_id: {{$id}},
                menu_id: id,
                jml: jml,
                subtotal: subtotal,
            },

            success: function(data) {
                console.log("Success update jumlah pesanan.");
                console.log(data)
            }
        });

    }

    function totalKeranjang(){
        let total = 0;
        $.ajax({
            type:'GET',
            url:"{{ route('getCollectiveDetailMenu') }}",
          success:function(data){
            console.log(data);
            for (var i = 0; i < data.length; i++) {
                if(data[i]['collective_detail_id'] == {{$id}}){
                    total +=  data[i]['subtotal'];
                }
            }
            $('#totalKeranjang').html(toRp(total));
            $('#total').val(total);
          }
        }); 
    }

    function toRp(angka) {
        var rev = parseInt(angka, 10).toString().split('').reverse().join('');
        var rev2 = '';
        for (var i = 0; i < rev.length; i++) {
            rev2 += rev[i];
            if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
                rev2 += '.';
            }
        }
        return rev2.split('').reverse().join('');
    }

</script>