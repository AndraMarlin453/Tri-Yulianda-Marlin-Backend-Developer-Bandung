@extends('layout.template')

@section('content')
<div class="my-4 p-3 bg-body rounded shadow-sm">
<h2 class="text-center">Masukkan Data Sampah</h2>
<a href="{{url('kalkulator')}}" class="btn btn-secondary mb-3">Kembali</a>
<a href="{{url('kalkulator')}}" class="btn btn-danger mb-3">Dashboard</a>
<div class="border mb-3"></div>

<div class="col-md-6">
    @if(session('info'))
        <div class="alert alert-info" role="alert">
            {{session('info')}}
        </div>
    @endif
</div>
<div class="col-md-6">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $item)
                <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<!-- START FORM -->
<form action='{{url('kalkulator')}}' method='post' enctype="multipart/form-data">
    @csrf
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{Session::get('nama')}}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='deskripsi' value="{{Session::get('deskripsi')}}" id="deskripsi">
            </div>
        </div>
        <div class="input-group mb-3 row">
            <label class="col-sm-2 col-form-label" for="inputGroupFile01">Upload Photo :</label>
            <input type="file" class="form-control" id="foto" name="foto">
          </div>
        <div class="mb-3 row">
            <label for="jenisSampah" class="col-sm-2 col-form-label">Jenis Sampah :</label>
            <div class="col-sm-10">
                <select name="jenisSampah" class="form-control" id="jenisSampah" value="{{Session::get('jenisSampah')}}">
                    <option value="kertas">Kertas</option>
                    <option value="plastik">Plastik</option>
                    <option value="logam">Logam</option>
                    <option value="kaca">Kaca</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jumlahSampah" class="col-sm-2 col-form-label">Jumlah Sampah :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='jumlahSampah' value="{{Session::get('jumlahSampah')}}" id="jumlahSampah" placeholder="dihitung dengan perkilogram">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga :</label>
            <div class="col-sm-10">
                <select name="harga" class="form-control" id="harga" value="{{Session::get('harga')}}">
                    <option value="kertas">Kertas: 2000</option>
                    <option value="plastik">Plastik: 3500</option>
                    <option value="logam">Logam: 10000</option>
                    <option value="kaca">Kaca: 8000</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10"><button type="submit" class="btn btn-primary position-right" name="submit">Simpan</button></div>
        </div>
</form>
</div>
<!-- AKHIR FORM -->
@endsection