@extends('layout/template_admin')
@section('content')

<div class="container-fluid bg-dark text-white">
    <!-- Page Heading -->
    <div style="justify-content: space-between; align-items: center;  margin-bottom: 10px;" class="d-none d-flex">
        <h3 class="mb-0 text-white-800 col-md-6"><?= $title; ?></h3>

        <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#addBrand">
            <i class="fas fa-plus" aria-hidden="true"></i>
            Tambah Data
        </button>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
        <i class="fas fa-check" aria-hidden="true"></i>
        <div class="ml-3">
            <b> {{ session('success') }}</b>
        </div>
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4 bg-dark text-white">
        <div class="card-header py-3 bg-light text-dark">
            <h6 class="m-0 font-weight-bold text-dark">{{ $title }}</h6>
        </div>

        <div class="card-body bg-light text-dark">
            <div class="table table-responsive table-light display nowrap">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr class="text-center align-middle">
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Brand</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->nama}}</td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-warning mr-3" id="btnEditBrand" data-bs-toggle="modal" data-bs-target="#editBrand" data-id="<?= $brand['id']; ?>" data-nama="<?= $brand['nama']; ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" id="btnDeleteBrand" data-bs-toggle="modal" data-bs-target="#deleteBrand" data-id="<?= $brand['id']; ?>" data-nama="<?= $brand['nama']; ?>">
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

@if (!$brands->isEmpty())
<!-- Edit Data Modal -->
<div class="modal fade" id="editBrand" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md bg-transparent">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title">Update {{ $title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/update_brand" method="post" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" class="form-control" />

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama" class="form-label"><i class="fas fa-id-card" aria-hidden="true"></i> Nama Brand</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" required>
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d--sm-flex modal-footer my-2" style="justify-content: end">
                    <button type="button" class="btn btn-danger mr-3" data-bs-dismiss="modal">
                        <i class="fas fa-trash" aria-hidden="true"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-warning" name="editBrand">
                        <i class="fas fa-edit" aria-hidden="true"></i> Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Data Modal -->
<div class="modal fade" id="deleteBrand" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md bg-transparent">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title">Delete {{ $title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/delete_brand" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="mb-3" style="text-align: center;"><b>Are You Sure to Delete This Brand ? </b></p>

                    <input type="hidden" id="id" name="id" class="form-control">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama" class="form-label"><i class="fas fa-id-card" aria-hidden="true"></i> Nama Brand</label>
                                <input type="text" class="form-control" name="nama" id="nama" readonly />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d--sm-flex modal-footer my-2" style="justify-content: end">
                    <button type="submit" class="btn btn-danger" name="deleteBrand">
                        <i class="fas fa-trash" aria-hidden="true"></i> Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<!-- Add Data Modal -->
<div class="modal fade" id="addBrand" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md bg-transparent">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title">Tambah {{ $title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/save_brand" method="post" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nama" class="form-label"><i class="fas fa-id-card" aria-hidden="true"></i> Nama Brand</label>
                                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" required>
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d--sm-flex modal-footer my-2" style="justify-content: end">
                    <button type="button" class="btn btn-danger mr-3" data-bs-dismiss="modal">
                        <i class="fas fa-trash" aria-hidden="true"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary" name="addNewBrand">
                        <i class="fas fa-plus" aria-hidden="true"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection