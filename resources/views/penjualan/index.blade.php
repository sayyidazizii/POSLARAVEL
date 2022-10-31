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
              <li class="breadcrumb-item"><a href="#">Kasir</a></li>
              <li class="breadcrumb-item active">{{auth()->user()->name}}</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <strong>No Invoice: </strong>A123546798JH{{no_invoice()}}
            </div>
              <div class="card-body">
                
              <table class="table table-bordered table-striped table-hover table-sm" id="datatable">
                  <thead class="bg-primary">                 
                    <tr>
                      <th>Barcode</th>
                      <th>Nama Barang</th>
                      <th>Harga Barang</th>
                      <th>QTY</th>
                      <th>Total Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" name="" id="" class="form-control" placeholder="Masukkan kode barcode" autofocus required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">Submit</button>
                    </div>
                </form>
                <hr>
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="Total Pembayaran" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="Pembayaran" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" name="" id="" class="form-control form-control-sm" placeholder="Kembalian" readonly>
                    </div>
                        <button type="submit" class="btn btn-primary btn-block">Simpan Transaksi</button>
                    </div>
                </form>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


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