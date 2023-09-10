$(document).on("click", "#btnEditAkun", function () {
    $(".modal-body #id").val($(this).data("id"));
    $(".modal-body #name").val($(this).data("nama"));
    $(".modal-body #email").val($(this).data("email"));
    $(".modal-body #hak_akses").val($(this).data("hak_akses"));
});

$(document).on("click", "#btnDeleteAkun", function () {
    $(".modal-body #id").val($(this).data("id"));
    $(".modal-body #name").val($(this).data("nama"));
    $(".modal-body #email").val($(this).data("email"));
    $(".modal-body #hak_akses").val($(this).data("hak_akses"));
});

$(document).on("click", "#btnEditProfile", function () {
    $(".modal-body #name").val($(this).data("nama"));
});

$(document).on("click", "#btnEditKategori", function () {
    $(".modal-body #id").val($(this).data("id"));
    $(".modal-body #nama").val($(this).data("nama"));
});

$(document).on("click", "#btnDeleteKategori", function () {
    $(".modal-body #id").val($(this).data("id"));
    $(".modal-body #nama").val($(this).data("nama"));
});

$(document).on("click", "#btnEditBrand", function () {
    $(".modal-body #id").val($(this).data("id"));
    $(".modal-body #nama").val($(this).data("nama"));
});

$(document).on("click", "#btnDeleteBrand", function () {
    $(".modal-body #id").val($(this).data("id"));
    $(".modal-body #nama").val($(this).data("nama"));
});

$(document).on("click", "#btnEditProduk", function () {
    $(".modal-body #id").val($(this).data("id"));
    $(".modal-body #id_kategori").val($(this).data("id_kategori"));
    $(".modal-body #id_brand").val($(this).data("id_brand"));
    $(".modal-body #nama").val($(this).data("nama"));
    $(".modal-body #harga").val($(this).data("harga"));
    $(".modal-body #caption_gambar").val($(this).data("caption_gambar"));
});

$(document).on("click", "#btnDeleteProduk", function () {
    $(".modal-body #id").val($(this).data("id"));
    $(".modal-body #id_kategori").val($(this).data("id_kategori"));
    $(".modal-body #id_brand").val($(this).data("id_brand"));
    $(".modal-body #nama").val($(this).data("nama"));
    $(".modal-body #harga").val($(this).data("harga"));
    $(".modal-body #caption_gambar").val($(this).data("caption_gambar"));
});

$(document).on("click", "#btnEditDetailProduk", function () {
    $(".modal-body #id_produk").val($(this).data("id"));
    $(".modal-body #nama").val($(this).data("nama"));
    $(".modal-body #jaringan").val($(this).data("jaringan"));
    $(".modal-body #os").val($(this).data("os"));
    $(".modal-body #cpu").val($(this).data("cpu"));
    $(".modal-body #gpu").val($(this).data("gpu"));
    $(".modal-body #ram").val($(this).data("ram"));
    $(".modal-body #ukuran_layar").val($(this).data("ukuran_layar"));
    $(".modal-body #tipe_layar").val($(this).data("tipe_layar"));
    $(".modal-body #resolusi_layar").val($(this).data("resolusi_layar"));
    $(".modal-body #kamera_depan").val($(this).data("kamera_depan"));
    $(".modal-body #kamera_belakang").val($(this).data("kamera_belakang"));
    $(".modal-body #sim").val($(this).data("sim"));
    $(".modal-body #baterai").val($(this).data("baterai"));
    $(".modal-body #dimensi").val($(this).data("dimensi"));
    $(".modal-body #berat").val($(this).data("berat"));
});

$(document).on("click", "#btnReplyPesan", function () {
    $(".modal-body #id").val($(this).data("id"));
    $(".modal-body #email_pengirim").val($(this).data("sender"));
    $(".modal-body #email").val($(this).data("recipient"));
    $(".modal-body #subyek").val("no-reply@techtown");
});

$(document).on("click", "#btnDeletePesan", function () {
    $(".modal-body #id").val($(this).data("id"));
    $(".modal-body #nama").val($(this).data("nama"));
    $(".modal-body #email").val($(this).data("email"));
    $(".modal-body #subyek").val($(this).data("subyek"));
    $(".modal-body #pesan").val($(this).data("pesan"));
});

$(document).on("click", "#btnProfile", function () {
    $(".modal-body #idUser").val($(this).data("id"));
    $(".modal-body #namaUser").val($(this).data("nama"));
    $(".modal-body #emailUser").val($(this).data("email"));
    $(".modal-body #username").val($(this).data("username"));
    $(".modal-body #passUser").val($(this).data("password"));
});
