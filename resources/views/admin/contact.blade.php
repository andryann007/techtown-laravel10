@extends('layout/template_admin')

@section('content')

<div class="container-fluid bg-dark text-white">
    <!-- Page Heading -->
    <div style="justify-content: space-between; align-items: center; margin-bottom:10px;" class="d-none d-flex">
        <h3 class="mb-0 text-white-800 col-md-6"><?= $title; ?></h3>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
        <i class="fas fa-check" aria-hidden="true"></i>
        <div class="ml-3">
            <b>{{ session('success') }}</b>
        </div>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
        <i class="fas fa-close" aria-hidden="true"></i>
        <div class="ml-3">
            <b>{{ session('error') }}</b>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Subyek</th>
                            <th>Pesan</th>
                            <th>Status</th>
                            <th>Reply</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td>
                                {{$contact->nama}}
                            </td>
                            <td>
                                {{$contact->email}}
                            </td>
                            <td>
                                {{$contact->subyek}}
                            </td>
                            <td>
                                {{$contact->pesan}}
                            </td>
                            <td>
                                {{$contact->status}}
                            </td>
                            <td>
                                <button type="button" class="btn btn-info" id="btnReplyPesan" data-bs-toggle="modal" data-bs-target="#replyMessage" data-id=<?= $contact['id']; ?> data-sender=<?= auth()->user()->email; ?> data-recipient=<?= $contact['email']; ?>>
                                    <i class="fas fa-reply" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" id="btnDeletePesan" data-bs-toggle="modal" data-bs-target="#deleteMessage" data-id=<?= $contact['id']; ?> data-nama=<?= $contact['nama']; ?> data-email=<?= $contact['email']; ?> data-subyek=<?= $contact['subyek']; ?> data-pesan=<?= $contact['pesan']; ?>>
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

<!-- Reply Modal -->
<div class="modal fade" id="replyMessage" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md bg-white text-dark">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reply Pesan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/reply_message" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">

                    <input type="hidden" id="status" name="status" value="replied">

                    <input type="hidden" id="replied_by" name="replied_by" value="{{auth()->user()->id}}">

                    <input type="hidden" id="nama" name="nama" value="{{$contact->nama}}">

                    <div class="form-group">
                        <label for="email_pengirim">Email Pengirim</label>
                        <input class="form-control" type="text" name="email_pengirim" id="email_pengirim" readonly />
                    </div>

                    <div class="form-group">
                        <label for="email">Email Penerima</label>
                        <input class="form-control" type="text" name="email" id="email" readonly />
                    </div>

                    <div class="form-group">
                        <label for="subyek">Subjek Email</label>
                        <input class="form-control" type="text" name="subyek" id="subyek" readonly />
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan Email</label>
                        <textarea rows="3" name="pesan" id="pesan" class="form-control" required></textarea>
                    </div>

                    <div class="d--sm-flex modal-footer mb-4">
                        <button type="button" class="btn btn-danger mr-2" data-bs-dismiss="modal">
                            <i class="fas fa-trash"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-dark reply" name="reply">
                            <i class="fas fa-paper-plane"></i> Kirim
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteMessage" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md bg-white text-dark">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Pesan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/admin/delete_message" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="mb-3" style="text-align: center;"><b>Are You Sure to Delete This Message ? </b></p>

                    <input type="hidden" id="id" name="id">

                    <div class="form-group">
                        <label for="nama">Nama Pengirim</label>
                        <input class="form-control" type="text" name="nama" id="nama" readonly />
                    </div>

                    <div class="form-group">
                        <label for="email">Email Pengirim</label>
                        <input class="form-control" type="text" name="email" id="email" readonly />
                    </div>

                    <div class="form-group">
                        <label for="subyek">Subjek Email</label>
                        <input class="form-control" type="text" name="subyek" id="subyek" readonly />
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan Email</label>
                        <input class="form-control" type="text" name="pesan" id="pesan" readonly />
                    </div>

                    <div class="d--sm-flex modal-footer mb-4">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection