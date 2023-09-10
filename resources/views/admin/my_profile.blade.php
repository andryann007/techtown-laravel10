@extends('layout/template_admin')

@section('content')

<section class="bg-dark">
    <div class="container py-2">
        <div style="justify-content: space-between; align-items: center; margin-bottom:10px;" class="d-none d-flex pb-3">
            <h3 class="mb-0 text-white-800 text-center col-md-12"><?= $title; ?></h3>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8 col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-2" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-dark" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            @if (auth()->user()->gambar_profil != null)
                                <img src="{{asset('storage/'. auth()->user()->gambar_profil)}}" alt="Gambar Profil" class="img-fluid my-5" style="width: 80px;" />
                            @endif

                            @if (auth()->user()->gambar_profil == null)
                                <img src="{{asset('img/assets/undraw_profile.svg')}}" alt="Gambar Profil" class="img-fluid my-5" style="width: 80px;" />
                            @endif

                            <h5>{{auth()->user()->name}}</h5>
                            <p>{{auth()->user()->hak_akses}}</p>
                            <a id="btnEditProfile" role="button" data-bs-toggle="modal" data-bs-target="#editProfile" data-nama=<?= auth()->user()->name; ?>>
                                <i class="far fa-edit mb-2"></i>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4 bg-white text-dark">
                                <h6>Informasi</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-8 mb-3">
                                        <h6><i class="fas fa-id-card"></i> Nama Lengkap</h6>
                                        <p class="text-muted">{{auth()->user()->name}}</p>
                                    </div>
                                    <div class="col-8 mb-3">
                                        <h6><i class="fas fa-envelope"></i> Email</h6>
                                        <p class="text-muted">{{auth()->user()->email}}</p>
                                    </div>
                                    <div class="col-8 mb-3">
                                        <h6><i class="fas fa-key"></i> Hak Akses</h6>
                                        <p class="text-muted">{{auth()->user()->hak_akses}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Edit Data Modal -->
<div class="modal fade" id="editProfile" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg bg-transparent">
        <div class="card bg-dark text-white" style="border-radius: 10px;">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">Update {{ $title }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/admin/update_profile" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" id="id" name="id" class="form-control" value="{{auth()->user()->id}}" />

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
                        <button type="submit" class="btn btn-warning" name="editProfile">
                            <i class="fas fa-edit" aria-hidden="true"></i> Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection