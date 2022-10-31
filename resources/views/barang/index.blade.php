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
                <a href="/barang/create" class="btn btn-primary">
                        <i class="fas fa-plus"></i>Tambah Data {{$title}}
                </a>
                    </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm" id="datatable">
                  <thead class="bg-primary">                 
                    <tr>
                      <th>No.</th>
                      <th>Supplier</th>
                      <th>Barcode</th>
                      <th>Nama</th>
                      <th>Satuan</th>
                      <th>Stok</th>
                      <th>Harga Beli</th>
                      <th>Harga Jual</th>
                      <th>Profit</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp

                    @foreach($barang as $item)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$item->supplier->nama}}</td>
                      <td>{{$item->barcode}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->satuan}}</td>
                      <td>{{$item->stok}}</td>
                      <td>{{"Rp. " . number_format($item->harga_beli, 0, ',', '.')}}</td>
                      <td>{{"Rp. " . number_format($item->harga_jual, 0, ',', '.')}}</td>
                      <td>{{"Rp. " . number_format($item->profit, 0, ',', '.')}}</td>
                      <td>
                        <a href="/barang/{{ $item->id }}/edit" class="btn btn-warning text-white btn-sm"><i class="fas fa-edit"></i>Edit</a>
                        <a href="/barang/{{ $item->id }}/destroy" 
                        onclick="return confirm('Yakin Mau Dihapus?!')" 
                        class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>Hapus</a>
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