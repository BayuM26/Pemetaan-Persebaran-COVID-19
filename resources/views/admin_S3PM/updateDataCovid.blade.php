@extends('layouts.tempat')
@section('content')
    @foreach ($data as $d)
        <form action="/KelolaDataCOVID/u/{{ $d->id_covid }}" method="post">
            <div class="isi">
                <a href="/KelolaDataCOVID" class="back"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
                
                @csrf
                <div class="mt-sm-3">
                    <label for="Perawataan mt-lg-4">Kecamatan</label>
                    <input type="text" value='{{ $d->Kecamatan }}' class="form-control perawatan" name="dalamPerawatan"  autocomplete="off" placeholder="" disabled>
                </div>

                <div class="mt-sm-3">
                    <label for="Perawataan mt-lg-4">Jumlah Dalam Perawatan</label>
                    <input type="number" value='{{ $d->Dalam_Perawatan }}' class="form-control perawatan" name="dalamPerawatan"  autocomplete="off" placeholder="Masukan Jumlah Dalam Perawatan" required>
                </div>

                <div class="mt-sm-3">
                    <label for="mandiri mt-lg-4">Jumlah Isolasi Mandiri</label>
                    <input type="number" value='{{ $d->Isolasi_Mandiri }}' class="form-control mandiri" name="isolasiMandiri"  autocomplete="off" placeholder="Masukan Jumlah Isolasi Mandiri" required>
                </div>

                <div class="mt-sm-3">
                    <label for="sembuh mt-lg-4">Jumlah Sembuh</label>
                    <input type="number" value='{{ $d->Sembuh }}' class="form-control sembuh" name="sembuh"  autocomplete="off" placeholder="Masukan Jumah Sembuh..." required>
                </div>

                <div class="mt-sm-3">
                    <label for="sembuh mt-lg-4">Jumlah Meninggal</label>
                    <input type="number" value='{{ $d->Meninggal }}' class="form-control meninggal" name="meninggal"  autocomplete="off" placeholder="Masukan Jumah Sembuh..." required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-save">Update Kecamatan </button>
            </div>     
        </form>
    @endforeach
@endsection