@extends('layout.template')

@section('content')
<!-- START DATA -->
<div class="my-4 p-3 bg-body rounded shadow-sm">
    <h2 class="text-center mb-3">Tabel Mahasiswa</h2>
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{url('mahasiswa')}}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari Mahasiswa" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href="{{url('mahasiswa/create')}}" class="btn btn-primary">Tambah Data</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="col-md-1">No.</th>
                <th class="col-md-3">NIM</th>
                <th class="col-md-4">Nama</th>
                <th class="col-md-2">Jurusan</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)    
            <tr>
                <td>{{$i}}.</td>
                <td>{{$item->nim}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->jurusan}}</td>
                <td>
                    <a href="{{url('mahasiswa/' . $item->nim. '/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" action="{{url('mahasiswa/' . $item->nim)}}" method="post" class="d-inline">
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
<!-- AKHIR DATA -->
@endsection


