@extends('layout.template')

@section('content')
<div class="my-4 p-3 bg-body rounded shadow-sm">
    <h2 class="text-center">Tabel Data Sampah</h2>
    <a href="{{url('kalkulator/create')}}" class="btn btn-primary mb-3">Tambah Data Sampah</a>
    <a href="{{url('kalkulator')}}" class="btn btn-danger mb-3">Dashboard</a>

    @if(session('danger'))
        <div class="alert alert-danger" role="alert">
            {{session('danger')}}
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="col-md-1">No.</th>
                <th class="col-md-3">Foto</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-3">Deskripsi</th>
                <th class="col-md-4">Jenis Sampah</th>
                <th class="col-md-2">Jumlah Sampah</th>
                <th class="col-md-2">Harga</th>
                <th class="col-md-2">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)    
            <tr>
                <td>{{$i}}.</td>
                <td>
                    <img src="{{asset('storage/foto/' . $item->foto)}}" alt="" width="50px">{{$item->foto}}
                </td>
                <td>{{$item->nama}}</td>
                <td>{{$item->deskripsi}}</td>
                <td>{{$item->jenisSampah}}</td>
                <td>{{$item->jumlahSampah}}</td>
                <td>{{$item->harga}}</td>
                <td>
                    <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" action="{{url('kalkulator/' . $item->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    {{$data->withQueryString()->links()}}
</div>
@endsection