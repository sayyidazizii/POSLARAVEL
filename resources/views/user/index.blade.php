@extends('template.layout')


@section('konten')
<div class="content-wrapper" style="min-height: 1203.31px;">
   
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data {{$title}}</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fas fa-plus"></i>Tambah Data {{$title}}
                 </button>
                    </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm" id="datatable">
                  <thead class="bg-primary">                 
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp

                    @foreach($user as $item)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->role}}</td>
                      <td>
                        <button type="button" id="btnEdit" data-id="{{ $item->id }}" data-nama="{{ $item->name }}" data-email="{{ $item->email }}"
                        class="btn btn-warning text-white btn-sm" data-toggle="modal" data-target="#modalEdit"><i class="fas fa-edit"></i>Edit</button>
                        <a href="/user/{{$item->id}}/destroy" onclick="return confirm('Yakin Mau Dihapus?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>Hapus</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<!-- Modal Tambah Data-->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah {{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/user" method="post">
        @csrf
       <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" id="name" required>
      </div>
      <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Data-->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit {{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/user" method="post" id="fromEdit">
        @csrf
       <div class="form-group">
                    <label for="editname">Nama</label>
                    <input type="text" name="editname" class="form-control" id="editname" required>
      </div>
      <div class="form-group">
                    <label for="editemail">Email</label>
                    <input type="email" name="editemail" class="form-control" id="editemail" required>
                  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '#btnEdit', function(){
   let id_user= $(this).data('id');
   let nama_user = $(this).data('nama');
   let email_user = $(this).data('email');

   $('#fromEdit').attr('action', 'user/'+id_user+'/update');
   $('#editname').val(nama_user );
   $('#editemail').val(email);
  });
</script>


@if (session('success'))
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    Toast.fire({
        icon: 'success',
        title: "{{session('success')}}"
      })
  });
  </script>
  
@endif
  @endsection