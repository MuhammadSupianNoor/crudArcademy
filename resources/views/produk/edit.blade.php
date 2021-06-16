@extends('produk.template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Halaman Edit Produk</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('produk.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('produk.update',$produk->id) }}" method="POST">
        @csrf
        @method('PUT')
 
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <strong>Nama Produk:</strong>
                    <input type="text" name="nama produk" value="{{ $produk->nama_produk }}" class="form-control" placeholder="nama produk">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    <input class="form-control"  name="keterangan" value="{{ $produk->keterangan }}" placeholder="keterangan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <strong>Content:</strong>
                    <input class="form-control"  name="harga" value="{{ $produk->harga }}" placeholder="harga">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <strong>Content:</strong>
                    <input class="form-control"  name="jumlah" value="{{ $produk->jumlah }}" placeholder="jumlah">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
 
    </form>
@endsection