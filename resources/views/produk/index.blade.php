@extends('produk.template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Aplikasi CRUD Sederhana</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('produk.create') }}"> Tambah Produk</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @elseif ($message = Session::get('danger'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @elseif ($message = Session::get('info'))
    <div class="alert alert-info">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama Produk</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($produks as $produk)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $produk->nama_produk }}</td>
            <td>{{ $produk->keterangan }}</td>
            <td>{{ $produk->harga }}</td>
            <td>{{ $produk->jumlah }}</td>
            <td class="text-center">
                <form action="{{ route('produk.destroy',$produk->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('produk.show',$produk->id) }}">Detail</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('produk.edit',$produk->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $produks->links() !!}
 
@endsection