@extends('layout/template_admin')

@section('content')

<div class="container-fluid bg-dark text-white">
    <!-- Page Heading -->
    <div style="justify-content: space-between; align-items: center; margin-bottom:10px;" class="d-none d-flex">
        <h3 class="mb-0 text-white-800 col-md-6"><?= $title; ?></h3>

        <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#addAccount">
            <i class="fas fa-plus" aria-hidden="true"></i>
            Tambah Data
        </button>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
        <i class="fas fa-check" aria-hidden="true"></i>
        <div class="ml-3">
            <b>{{ session('success') }}</b>
        </div>
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4 bg-dark text-white">
        <div class="card-header py-3 bg-light text-dark">
            <h6 class="m-0 font-weight-bold text-dark">
                {{ $title }}
            </h6>
        </div>

        <div class="card-body bg-light text-dark">
            <div class="table table-responsive table-light display nowrap">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr class="text-center align-middle">
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Password Hash</th>
                            <th>Hak Akses</th>
                            <th>Gambar Profil</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{$user->password}}
                            </td>
                            <td>
                                {{$user->hak_akses}}
                            </td>
                            <td>
                                @if ($user->gambar_profil != null)
                                <img src="{{ asset('storage/'. $user->gambar_profil) }}" alt="Gambar profil user" class="img-thumbnail" style="width: 25%;">
                                @endif

                                @if ($user->gambar_profil == null)
                                <img src="{{asset('img/assets/undraw_profile.svg')}}" alt="Gambar profil user" class="img-thumbnail" style="width: 25%;">
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" id="btnEditAkun" data-bs-toggle="modal" data-bs-target="#editAccount" data-id="<?= $user['id']; ?>" data-nama="<?= $user['name']; ?>" data-email="<?= $user['email']; ?>" data-hak_akses="{{$user['hak_akses']}}">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" id="btnDeleteAkun" data-bs-toggle="modal" data-bs-target="#deleteAccount" data-id="<?= $user['id']; ?>" data-nama="<?= $user['name']; ?>" data-email="<?= $user['email']; ?>" data-hak_akses="{{$user['hak_akses']}}">
                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Data Modal -->
<div class="modal fade" id="addAccount" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg bg-transparent">
        <div class="card bg-dark text-white" style="border-radius: 10px">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah {{ $title }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/admin/save_akun" method="post" enctype="multipart/form-data" class="needs-validation">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label"><i class="fas fa-id-card" aria-hidden="true"></i> Nama Lengkap</label>
                                    <input class="form-control @error('nama') is-invalid @enderror" type="text" name="name" id="name" required>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label"><i class="fas fa-envelope" aria-hidden="true"></i> Email</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-label"><i class="fas fa-lock" aria-hidden="true"></i> Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hak_akses" class="form-label"><i class="fas fa-key" aria-hidden="true"></i> Hak Akses</label>
                                    <select class="form-control" name="hak_akses" id="hak_akses" required>
                                        <option value="super-admin">Super Admin</option>
                                        <option value="admin">Admin</option>
                                    </select>

                                    @error('hak_akses')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="gambar_profil" class="form-label"><i class="fas fa-image" aria-hidden="true"></i> Gambar Profil</label>
                                <input type="file" class="custom-file @error('gambar_profil') is-invalid @enderror" id="gambar_profil" name="gambar_profil">
                                @error('gambar_profil')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d--sm-flex modal-footer my-2" style="justify-content: end;">
                        <button type="button" class="btn btn-danger mr-3" data-bs-dismiss="modal">
                            <i class="fas fa-trash" aria-hidden="true"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary" name="addNewAccount">
                            <i class="fas fa-plus" aria-hidden="true"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if (!$users->isEmpty())
<!-- Edit Data Modal -->
<div class="modal fade" id="editAccount" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg bg-transparent">
        <div class="card bg-dark text-white" style="border-radius: 10px;">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">Update {{ $title }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/admin/update_akun" method="post" enctype="multipart/form-data" class="needs-validation">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" id="id" name="id" class="form-control" />

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label"><i class="fas fa-id-card" aria-hidden="true"></i> Nama Lengkap</label>
                                    <input class="form-control @error('nama') is-invalid @enderror" type="text" name="name" id="name" required>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label"><i class="fas fa-envelope" aria-hidden="true"></i> Email</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hak_akses" class="form-label"><i class="fas fa-key" aria-hidden="true"></i> Hak Akses</label>
                                    <select class="form-control" name="hak_akses" id="hak_akses" required>
                                        <option value="super-admin">Super Admin</option>
                                        <option value="admin">Admin</option>
                                    </select>

                                    @error('hak_akses')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="gambar_profil" class="form-label"><i class="fas fa-image" aria-hidden="true"></i> Gambar Profil</label>
                                <input type="file" class="custom-file @error('gambar_profil') is-invalid @enderror" id="gambar_profil" name="gambar_profil">
                                @error('gambar_profil')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d--sm-flex modal-footer my-2" style="justify-content: end;">
                        <button type="button" class="btn btn-danger mr-3" data-bs-dismiss="modal">
                            <i class="fas fa-trash" aria-hidden="true"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-warning" name="editAccount">
                            <i class="fas fa-edit" aria-hidden="true"></i> Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Data Modal -->
<div class="modal fade" id="deleteAccount" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg bg-transparent">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title">Delete {{ $title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/delete_akun" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="mb-3" style="text-align: center;"><b>Are You Sure to Delete This Account ? </b></p>

                    <input type="hidden" id="id" name="id" class="form-control">

                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name" class="form-label"><i class="fas fa-id-card" aria-hidden="true"></i> Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="form-label"><i class="fas fa-envelope" aria-hidden="true"></i> Email</label>
                                <input type="email" name="email" id="email" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="hak_akses" class="form-label"><i class="fas fa-key" aria-hidden="true"></i> Hak Akses</label>
                                <input type="text" name="hak_akses" id="hak_akses" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d--sm-flex modal-footer my-2" style="justify-content: end;">
                    <button type="submit" class="btn btn-danger" name="deleteAccount">
                        <i class="fas fa-trash" aria-hidden="true"></i> Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection