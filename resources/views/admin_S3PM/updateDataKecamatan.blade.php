@extends('layouts.tempat')
@section('content')
    <div class="isi">
        <a href="/KelolaKecamatan" class="back"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>

        @foreach ($data as $d)
            <form action="/KelolaKecamatan/u/{{ $d->id_kecamatan }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="mt-sm-2">
                        <label for="NamaKecamatan">Nama Kecamatan</label>
                        <input type="text" class="form-control NamaKecamatan" name="NamaKecamatan" value='{{ $d->Nama_Kecamatan }}' autocomplete="off" placeholder="NIP" required>
                    </div>

                    <div class="mt-sm-2">
                        <label for="latitude mt-lg-4">Latitude</label>
                        <input type="text" class="form-control latitude" name="latitude" value='{{ $d->Latitude }}' autocomplete="off" placeholder="NAMA" required>
                    </div>

                    <div class="mt-sm-2">
                        <label for="longitude mt-lg-4">Longitude</label>
                        <input type="text" class="form-control longitude" name="longitude" value='{{ $d->Longitude }}' placeholder=""autocomplete="off"  placeholder="USERNAME" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-save" name="btn_update_data_kecamatan">Update Data<i class="bi bi-arrow-repeat"></i></button>
                </div>
            </form>
        @endforeach
    </div>
@endsection