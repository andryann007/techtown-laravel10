@extends('layout/template_admin')
@section('content')

<div class="container-fluid bg-dark text-white">
    <!-- Page Heading -->
    <div style="justify-content: space-between; align-items: center;  margin-bottom: 10px;" class="d-none d-flex">
        <h3 class="mb-0 text-white-800 col-md-6"><?= $title; ?></h3>

        <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#addProduct">
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
            <h6 class="m-0 font-weight-bold text-dark">{{ $title }}</h6>
        </div>

        <div class="card-body bg-light text-dark">
            <div class="table table-responsive table-light display nowrap">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr class="text-center align-middle">
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Brand</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Caption Gambar</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$product->nama}}</td>
                            <td>{{$product->nama_kategori}}</td>
                            <td>{{$product->nama_brand}}</td>
                            <td>{{"Rp. " . number_format($product->harga, 2, ',', '.')}}</td>
                            <td>
                                <img src="{{ asset('storage/'. $product->gambar) }}" alt="{{$product->caption_gambar}}" class="img-thumbnail">
                            </td>
                            <td>{{$product->caption_gambar}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" id="btnEditProduk" data-bs-toggle="modal" data-bs-target="#editProduct" data-id="<?= $product['id']; ?>" data-id_kategori="<?= $product['id_kategori']; ?>" data-id_brand="<?= $product['id_brand']; ?>" data-nama="<?= $product['nama']; ?>" data-harga="<?= $product['harga']; ?>" data-caption_gambar="<?= $product['caption_gambar']; ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" id="btnDeleteProduk" data-bs-toggle="modal" data-bs-target="#deleteProduct" data-id="<?= $product['id']; ?>" data-id_kategori="<?= $product['nama_kategori']; ?>" data-id_brand="<?= $product['nama_brand']; ?>" data-nama="<?= $product['nama']; ?>" data-harga="<?= $product['harga']; ?>" data-caption_gambar="<?= $product['caption_gambar']; ?>">
                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                            <form action="/admin/produk/detail">
                                <td>
                                    <input type="hidden" id="id" name="id" class="form-control" value="{{$product->id}}" />

                                    <button type="submit" class="btn btn-primary" id="btnDetailProduk">
                                        <i class="fas fa-info-circle" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Data Modal -->
<div class="modal fade" id="addProduct" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md bg-transparent">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title">Tambah {{ $title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/save_produk" method="post" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_kategori" class="form-label">Nama Kategori</label>
                                <select class="form-control" name="id_kategori" id="id_kategori" required>
                                    @foreach ($categories as $category)
                                    <option value="{{$category['id']}}">
                                        {{($category['nama'])}}
                                    </option>
                                    @endforeach
                                </select>

                                @error('id_kategori')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" required>
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_brand" class="form-label">Nama Brand</label>
                                <select class="form-control" name="id_brand" id="id_brand" required>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand['id']}}">
                                        {{($brand['nama'])}}
                                    </option>
                                    @endforeach
                                </select>

                                @error('id_brand')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="harga" class="form-label">Harga Produk</label>
                                <input class="form-control @error('harga') is-invalid @enderror" type="number" name="harga" id="harga" required>

                                @error('harga')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="gambar" class="form-label">Gambar Produk</label>
                            <input type="file" class="custom-file @error('gambar') is-invalid @enderror" id="gambar" name="gambar" required>
                            @error('gambar')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="caption_gambar" class="form-label">Caption Gambar</label>
                                <textarea class="form-control @error('caption_gambar') is-invalid @enderror" name="caption_gambar" id="caption_gambar" rows="3" required></textarea>

                                @error('caption_gambar')
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
                    <button type="submit" class="btn btn-primary" name="addNewProduct">
                        <i class="fas fa-plus" aria-hidden="true"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (!$products->isEmpty())
<!-- Edit Data Modal -->
<div class="modal fade" id="editProduct" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md bg-transparent">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title">Update {{ $title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/update_produk" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" class="form-control">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_kategori" class="form-label">Nama Kategori</label>
                                <select class="form-control" name="id_kategori" id="id_kategori" required>
                                    @foreach ($categories as $category)
                                    <option value="{{$category['id']}}">
                                        {{($category['nama'])}}
                                    </option>
                                    @endforeach
                                </select>

                                @error('id_kategori')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" required>
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_brand" class="form-label">Nama Brand</label>
                                <select class="form-control" name="id_brand" id="id_brand" required>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand['id']}}">
                                        {{($brand['nama'])}}
                                    </option>
                                    @endforeach
                                </select>

                                @error('id_brand')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="harga" class="form-label">Harga Produk</label>
                                <input class="form-control @error('harga') is-invalid @enderror" type="number" name="harga" id="harga" required>

                                @error('harga')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="gambar" class="form-label">Gambar Produk</label>
                            <input type="file" class="custom-file @error('gambar') is-invalid @enderror" id="gambar" name="gambar" required>
                            @error('gambar')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="caption_gambar" class="form-label">Caption Gambar</label>
                                <textarea class="form-control @error('caption_gambar') is-invalid @enderror" name="caption_gambar" id="caption_gambar" rows="3" required></textarea>

                                @error('caption_gambar')
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
                    <button type="submit" class="btn btn-warning" name="editProduct">
                        <i class="fas fa-edit" aria-hidden="true"></i> Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Data Modal -->
<div class="modal fade" id="deleteProduct" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md bg-transparent">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title">Delete {{ $title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/delete_produk" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="mb-3" style="text-align: center;"><b>Are You Sure to Delete This Produk ? </b></p>

                    <input type="hidden" class="form-control" id="id" name="id">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_kategori" class="form-label">Nama Kategori</label>
                                <input class="form-control" type="text" name="id_kategori" id="id_kategori" readonly>
                            </div>

                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input class="form-control" type="text" name="nama" id="nama" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_brand" class="form-label">Nama Brand</label>
                                <input class="form-control" type="text" name="id_brand" id="id_brand" readonly>
                            </div>

                            <div class="form-group">
                                <label for="harga" class="form-label">Harga Produk</label>
                                <input class="form-control" type="number" name="harga" id="harga" readonly>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="gambar" class="form-label">Gambar Produk</label>
                            <input type="file" class="custom-file @error('gambar') is-invalid @enderror" id="gambar" name="gambar" readonly>
                            @error('gambar')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="caption_gambar" class="form-label">Caption Gambar</label>
                                <textarea class="form-control" name="caption_gambar" id="caption_gambar" rows="3" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d--sm-flex modal-footer my-2" style="justify-content: end">
                    <button type="submit" class="btn btn-danger" name="deleteProduct">
                        <i class="fas fa-trash" aria-hidden="true"></i> Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection