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
          <input ttype="text" name="nama_collective" class="form-control" id="nama_collective" placeholder="Nama Collective">
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
  // function tambahMenu(id){
  //   let isiMenu = $('.isi-menu-'+id);
  //   let idMenu = $('#id-menu-'+id).val();
  //   let text = `<div class="form-group col-sm-4" id="menu`+idMenu+`">
  //                 <div class="card">
  //                   <div class="card-header">
  //                     Username
  //                   </div>
  //                   <div class="card-body">
  //                     <h5 class="card-title">Nama Menu</h5>
  //                     <p class="card-text">Rp. 50.000</p>
  //                     <div>
  //                       <button class="btn btn-outline-success" type="button" onclick="" id="button-addon1">-</button>
  //                       <input class="text-center border" type="text" id="jml" style="width: 10%" value="1">
  //                       <button class="btn btn-outline-success" type="button" onclick="" id="button-addon1">+</button>
  //                     </div>
  //                     <a href="#" class="btn btn-primary mt-2">Hapus</a>
  //                   </div>
  //                 </div>
  //               </div>`;
  //   isiMenu.append(text);
  //   idMenu_baru = parseInt(idMenu)+1;
  //   $('#id-menu-'+id).val(idMenu_baru);
  //   console.log(idMenu_baru);
  // }

  function tambahOrang(){
    let isiColective = $('.isi-collective');
    let idColective = $('#id-collective').val();
    console.log(parseInt(idColective));
    let id = 1;
    // let id = parseInt(idColective);
    let text = `<div class="form-group col-sm-4" id='id${idColective}'>
          <input type="text" class="form-control" id="username" placeholder="Username">
          <div class="mt-3">
            <form action="{{route("pilih-menu-collective")}}" method="POST">
              @csrf
              <input type="text" name="id_user" hidden="" value="${idColective}">
              <button class="btn button-beli center" style="font-size: 10px;">+ Tambah Menu</button>
            </form>
          </div>
        </div>        
        <div class="form-group col-sm-8">
          <div class="row isi-menu-${idColective}"> 
          </div>          
        </div>`;
    isiColective.append(text);
    idColective_baru = parseInt(idColective)+1;
    $('#id-collective').val(idColective_baru);
  }
</script>

<!-- content -->
@endsection