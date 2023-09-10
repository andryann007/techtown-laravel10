@extends('layout/template_admin')
@section('content')

<section class="bg-dark">
    <div class="container bg-dark py-3">
        <div style="justify-content: space-between; align-items: center;" class="d-flex pb-3">
            <h3 class="text-white-800 col-md-9"><?= $title; ?></h3>

            <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#addDetail">
                <i class="fas fa-plus" aria-hidden="true"></i>
                Tambah Detail
            </button>

            @foreach ($details as $detail)
            <button type="button" class="btn btn-warning btn-sm text-white" id="btnEditDetailProduk"
                data-bs-toggle="modal" data-bs-target="#editDetail" data-id="<?= $detail['id_produk']; ?> " 
                data-nama="<?= $detail['nama']; ?> " data-jaringan="<?= $detail['jaringan']; ?>" 
                data-os="<?= $detail['os']; ?>" data-cpu="<?= $detail['cpu']; ?>"
                data-gpu="<?= $detail['gpu']; ?>" data-ram="<?= $detail['ram']; ?>" 
                data-ukuran_layar="<?= $detail['ukuran_layar']; ?>" data-tipe_layar="<?= $detail['tipe_layar']; ?>"
                data-resolusi_layar="<?= $detail['resolusi_layar']; ?>" data-kamera_depan="<?= $detail['kamera_depan']; ?>"
                data-kamera_belakang="<?= $detail['kamera_belakang']; ?>" data-sim="<?= $detail['sim']; ?>"
                data-baterai="<?= $detail['baterai']; ?>" data-dimensi="<?= $detail['dimensi']; ?>"
                data-berat="<?= $detail['berat']; ?>">
                <i class="fas fa-edit" aria-hidden="true"></i>
                Edit Detail
            </button>
            @endforeach
        </div>

        <div class="card text-black">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-4">
                    @foreach ($products as $product)
                    <img src="{{asset('storage/'. $product->gambar)}}" class="card-img-top" alt="{{$product->caption_gambar}}" />
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title text-dark">Deskripsi Produk</h5>
                            <p class="text-muted mb-4">{{$product->nama}}</p>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between text-dark">
                                <span>Brand</span><span style="font-weight: bold;">{{$product->nama_brand}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>Kategori</span><span style="font-weight: bold;">{{$product->nama_kategori}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>Harga</span><span style="font-weight: bold;">{{"Rp. " . number_format($product->harga, 2, ',', '.')}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4" style="border-left: 1px;">
                    <h5 class="text-center text-dark pt-3">Detail Produk</h5>
                    <hr>

                    @if ($details->isEmpty())
                    <div class="card-body">
                        <div>
                            <h5 class="text-danger text-center" style="font-weight: bold;">Detail Produk Masih Kosong !!!</h5>
                            <h6 class="text-dark text-center" style="font-weight: bold;">Harap Isi Detail Produk !!!</h6>
                        </div>
                    </div>
                    @endif

                    @if (!$details->isEmpty())
                    @foreach ($details as $detail)
                    <div class="card-body">
                        <div>
                            <div class="d-flex justify-content-between text-dark">
                                <span>Jaringan</span><span style="font-weight: bold;">{{$detail->jaringan}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>OS</span><span style="font-weight: bold;">{{$detail->os}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>CPU</span><span style="font-weight: bold;">{{$detail->cpu}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>GPU</span><span style="font-weight: bold;">{{$detail->gpu}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>RAM</span><span style="font-weight: bold;">{{$detail->ram}} GB</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>Ukuran Layar</span><span style="font-weight: bold;">{{$detail->ukuran_layar}} inch</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>Tipe Layar</span><span style="font-weight: bold;">{{$detail->tipe_layar}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>Resolusi</span><span style="font-weight: bold;">{{$detail->resolusi_layar}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>Kamera Depan</span><span style="font-weight: bold;">{{$detail->kamera_depan}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>Kamera Belakang</span><span style="font-weight: bold;">{{$detail->kamera_belakang}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>SIM</span><span style="font-weight: bold;">{{$detail->sim}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>Baterai</span><span style="font-weight: bold;">{{$detail->baterai}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>Dimensi</span><span style="font-weight: bold;">{{$detail->dimensi}}</span>
                            </div>
                            <div class="d-flex justify-content-between text-dark mt-2">
                                <span>Berat</span><span style="font-weight: bold;">{{$detail->berat}} gr</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Data Modal -->
<div class="modal fade" id="addDetail" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg bg-transparent">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title">Tambah {{ $title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/produk/save_detail" method="post" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input class="form-control" type="hidden" name="id_produk" id="id_produk" value="{{$product['id']}}"/>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" value="{{$product['nama']}}" readonly>
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cpu" class="form-label">CPU</label>
                                <input class="form-control @error('cpu') is-invalid @enderror" type="text" name="cpu" id="cpu" required>
                                @error('cpu')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ukuran_layar" class="form-label">Ukuran Layar</label>
                                <input class="form-control @error('ukuran_layar') is-invalid @enderror" type="number" name="ukuran_layar" id="ukuran_layar" required>
                                @error('ukuran_layar')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jaringan" class="form-label">Jaringan</label>
                                <input class="form-control @error('jaringan') is-invalid @enderror" type="text" name="jaringan" id="jaringan" required>
                                @error('jaringan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gpu" class="form-label">GPU</label>
                                <input class="form-control @error('gpu') is-invalid @enderror" type="text" name="gpu" id="gpu" required>
                                @error('gpu')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tipe_layar" class="form-label">Tipe Layar</label>
                                <input class="form-control @error('tipe_layar') is-invalid @enderror" type="text" name="tipe_layar" id="tipe_layar" required>
                                @error('tipe_layar')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="os" class="form-label">Sistem Operasi</label>
                                <input class="form-control @error('os') is-invalid @enderror" type="text" name="os" id="os" required>
                                @error('os')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ram" class="form-label">Kapasitas RAM</label>
                                <input class="form-control @error('ram') is-invalid @enderror" type="number" name="ram" id="ram" required>
                                @error('ram')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="resolusi_layar" class="form-label">Resolusi Layar</label>
                                <input class="form-control @error('resolusi_layar') is-invalid @enderror" type="text" name="resolusi_layar" id="resolusi_layar" required>
                                @error('resolusi_layar')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kamera_depan" class="form-label">Kamera Depan</label>
                                <input class="form-control @error('kamera_depan') is-invalid @enderror" type="text" name="kamera_depan" id="kamera_depan" required>
                                @error('kamera_depan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="sim" class="form-label">Tipe SIM</label>
                                <input class="form-control @error('sim') is-invalid @enderror" type="text" name="sim" id="sim" required>
                                @error('sim')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kamera_belakang" class="form-label">Kamera Belakang</label>
                                <input class="form-control @error('kamera_belakang') is-invalid @enderror" type="text" name="kamera_belakang" id="kamera_belakang" required>
                                @error('kamera_belakang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="baterai" class="form-label">Jenis Baterai</label>
                                <input class="form-control @error('baterai') is-invalid @enderror" type="text" name="baterai" id="baterai" required>
                                @error('baterai')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dimensi" class="form-label">Dimensi</label>
                                <input class="form-control @error('dimensi') is-invalid @enderror" type="text" name="dimensi" id="dimensi" required>
                                @error('dimensi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="berat" class="form-label">Berat</label>
                                <input class="form-control @error('berat') is-invalid @enderror" type="number" name="berat" id="berat" required>
                                @error('berat')
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
                    <button type="submit" class="btn btn-primary" name="addNewDetail">
                        <i class="fas fa-plus" aria-hidden="true"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (!$details->isEmpty())
<!-- Edit Data Modal -->
<div class="modal fade" id="editDetail" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg bg-transparent">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title">Update {{ $title }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/produk/update_detail" method="post" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input class="form-control" type="hidden" name="id_produk" id="id_produk"/>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" readonly>
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cpu" class="form-label">CPU</label>
                                <input class="form-control @error('cpu') is-invalid @enderror" type="text" name="cpu" id="cpu" required>
                                @error('cpu')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ukuran_layar" class="form-label">Ukuran Layar</label>
                                <input class="form-control @error('ukuran_layar') is-invalid @enderror" type="number" name="ukuran_layar" id="ukuran_layar" required>
                                @error('ukuran_layar')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jaringan" class="form-label">Jaringan</label>
                                <input class="form-control @error('jaringan') is-invalid @enderror" type="text" name="jaringan" id="jaringan" required>
                                @error('jaringan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gpu" class="form-label">GPU</label>
                                <input class="form-control @error('gpu') is-invalid @enderror" type="text" name="gpu" id="gpu" required>
                                @error('gpu')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tipe_layar" class="form-label">Tipe Layar</label>
                                <input class="form-control @error('tipe_layar') is-invalid @enderror" type="text" name="tipe_layar" id="tipe_layar" required>
                                @error('tipe_layar')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="os" class="form-label">Sistem Operasi</label>
                                <input class="form-control @error('os') is-invalid @enderror" type="text" name="os" id="os" required>
                                @error('os')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ram" class="form-label">Kapasitas RAM</label>
                                <input class="form-control @error('ram') is-invalid @enderror" type="number" name="ram" id="ram" required>
                                @error('ram')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="resolusi_layar" class="form-label">Resolusi Layar</label>
                                <input class="form-control @error('resolusi_layar') is-invalid @enderror" type="text" name="resolusi_layar" id="resolusi_layar" required>
                                @error('resolusi_layar')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kamera_depan" class="form-label">Kamera Depan</label>
                                <input class="form-control @error('kamera_depan') is-invalid @enderror" type="text" name="kamera_depan" id="kamera_depan" required>
                                @error('kamera_depan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="sim" class="form-label">Tipe SIM</label>
                                <input class="form-control @error('sim') is-invalid @enderror" type="text" name="sim" id="sim" required>
                                @error('sim')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kamera_belakang" class="form-label">Kamera Belakang</label>
                                <input class="form-control @error('kamera_belakang') is-invalid @enderror" type="text" name="kamera_belakang" id="kamera_belakang" required>
                                @error('kamera_belakang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="baterai" class="form-label">Jenis Baterai</label>
                                <input class="form-control @error('baterai') is-invalid @enderror" type="text" name="baterai" id="baterai" required>
                                @error('baterai')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dimensi" class="form-label">Dimensi</label>
                                <input class="form-control @error('dimensi') is-invalid @enderror" type="text" name="dimensi" id="dimensi" required>
                                @error('dimensi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="berat" class="form-label">Berat</label>
                                <input class="form-control @error('berat') is-invalid @enderror" type="number" name="berat" id="berat" required>
                                @error('berat')
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
                    <button type="submit" class="btn btn-warning" name="updateDetail">
                        <i class="fas fa-edit" aria-hidden="true"></i> Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection