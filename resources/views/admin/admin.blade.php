@extends('layouts.tempat')

@section('content')
        <div class="isi">

            <div class="row">
                <div class="ms-sm-3">
                    <h3 class="title"><b>DATA ADMIN</b></h3>
                </div>
            </div>

            <div class="row mt-sm-4">
                <div class="offset-sm-1 col-sm-3">
                    <button class="btn btn-tambahadmin" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Admin</button>
                </div>

                <div class="offset-sm-2 col-sm-5">
                    <input type="text" id="searchAdmin" class="search form-control" placeholder="Search Nama Admin...">
                </div>
            </div>
                <div class="w3-responsive mt-sm-4 mb-sm-4">
                    <table class="w3-table-all w3-hoverable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Hak Akses</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        
                        @php
                            $no=1;
                        @endphp

                        <tbody id="tampilAdmin">
                           @foreach ($dataUser as $du)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $du->name }}</td>
                                <td>{{ $du->username }}</td>
                                <td>{{ ($du->hak_akses === "admin" ? 'Admin' : 'Admin S3PM' ) }}</td>
                                <td>
                                    <a href='/admin/d/{{ $du->id_user }}' class='btn btn-danger' id=''><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <a href='/admin/u/{{ $du->id_user }}' class='btn btn-primary'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <!-- modal input admin-->  
        <div class="modal fade w3-animate-opacity" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Masukan Data Admin Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="admin" method="post">
                    <div class="modal-body">
                        
                        {{ csrf_field() }}
                        <div class="mt-sm-2">
                            <label for="nama mt-lg-4">Nama</label>
                            <input type="text" class="form-control nama" name="nama"  autocomplete="off" placeholder="NAMA" required>
                        </div>

                        <div class="mt-sm-2">
                            <label for="hakAkses mt-lg-4">Hak Akses</label>
                            <select class="form-select hakAkses" name="hakAkses" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option disabled selected>Pilih Hak Akses....</option>
                                <option value="admin">Admin</option>
                                <option value="admin_S3PM">Admin S3PM</option>
                            </select>
                        </div>

                        <div class="mt-sm-2">
                            <label for="username mt-lg-4">Username</label>
                            <input type="text" class="form-control username" name="username"  autocomplete="off" placeholder="USERNAME" required>
                        </div>

                        <div class="mt-sm-2">
                            <label for="nip mt-lg-4">Password</label>
                            <input type="text" class="form-control nip" name="password"  autocomplete="off" placeholder="PASSWORD" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-save" name="btn_save_admin">Simpan Data <i class="bi bi-save2"></i></button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    <!-- end modal input admin-->
@endsection
