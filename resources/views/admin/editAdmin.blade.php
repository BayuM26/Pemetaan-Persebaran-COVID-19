@extends('../layouts.tempat')

@section('content')
        <div class="isi">
            <a href="/admin" class="back"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
            
            @foreach ($dataUser as $du)
                <form action="/admin/u" method="post">
                    @csrf
                    <div class="modal-body">
                            <input type="hidden" name="id" value='{{ $du->id_user }}'>
                        <div class="mt-sm-2">
                            <label for="nama mt-lg-4">Nama</label>
                            <input type="text" class="form-control nama" name="nama" value='{{ $du->name }}' autocomplete="off" placeholder="NAMA" required>
                        </div>

                        <div class="mt-sm-2">
                            <label for="username mt-lg-4">Username</label>
                            <input type="text" class="form-control username" name="username" value='{{ $du->username }}' autocomplete="off"  placeholder="USERNAME" required>
                        </div>

                        <div class="mt-sm-2">
                            <label for="hak_akses mt-lg-4">Hak Akses</label>
                            <select name="hak_akses" id="" class="form-select hak_akses">
                                <option disabled>-- Pilih Hak Akses --</option>
                                <option value="admin" {{ ($du->hak_akses === 'admin') ? 'selected' : ''}}>Admin</option>
                                <option value="adminS3PM" {{ ($du->hak_akses === 'admin_S3PM') ? 'selected' : ''}}>Admin S3PM</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-save" name="btn_update_data_admin">Update Data <i class="bi bi-arrow-repeat"></i></button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection