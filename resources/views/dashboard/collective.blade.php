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
    <form action="" method="POST">
      <div class="form-row">
        <div class="form-group col-sm-3">
          <input type="text" name="nama_collective" class="form-control" id="nama_collective" required placeholder="Nama Collective">
        </div>
      </div>
      <hr style="background-color: rgb(91, 159, 85); height: 5px;">
      <div class="form-row isi-collective mt-2 isi-collective">
        
      </div>
    </form>
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
    let text = `<div class="form-group col-sm-4" id='id${idColective}'>
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