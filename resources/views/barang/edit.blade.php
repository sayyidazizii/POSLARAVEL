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
                <h3 class="card-title">Edit Data {{$title}}</h3>
              </div>
              <form action="/barang/update/{{ $barang->id }}" method="post">
                @method('put')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="supplier_id">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-control">
                    @foreach($supplier as $item)
                    <option value="{{$item->id}}" {{$barang->supplier_id == $item->id ? 'selected' : ''}}>{{$item->nama}}</option>
                    @endforeach
                </select>
                </div>
                  <div class="form-group">
                    <label for="barcode">Barcode</label>
                    <input type="text" name="barcode" class="form-control" id="barcode" required value="{{ $barang->barcode }}">
                    </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" required value="{{ $barang->nama }}">
                    </div>
                  <div class="form-group">
                    <label for="satuan">Satuan</label>
                <select name="satuan" id="satuan" class="form-control">
                    <option value="pcs" {{ $barang->satuan == 'pcs' ? 'selected' : ''}}>PCS</option>
                    <option value="pck" {{ $barang->satuan == 'pck' ? 'selected' : '' }}>PCK</option>
                </select>
                </div>
                  <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" name="stok" class="form-control" id="stok" required value="{{ $barang->stok }}">
                    </div>
                  <div class="form-group">
                    <label for="harga_beli">Harga Beli</label>
                    <input type="text" name="harga_beli" class="form-control" id="harga_beli" required value="{{ $barang->harga_beli }}">
                    </div>
                  <div class="form-group">
                    <label for="harga_jual">Harga Jual</label>
                    <input type="text" name="harga_jual" class="form-control" id="harga_jual" onkeyup="kalkulasi()" requied value="{{ $barang->harga_jual }}">
                    </div>
                  <div class="form-group">
                    <label for="profit">Profit</label>
                    <input type="text" name="profit" class="form-control" id="profit" readonly value="{{ $barang->profit }}">
                    </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="/barang" class="btn btn-light">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
    function kalkulasi(){
      let harga_beli = document.getElementById('harga_beli').value;
      let harga_jual = document.getElementById('harga_jual').value;
      let profit = document.getElementById('profit');

      profit.value = parseInt(harga_jual)-parseInt(harga_beli);
    }
  </script>

  @endsection