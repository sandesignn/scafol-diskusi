<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url() ?>/assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/my-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/js/dropzone/dropzone.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/js/dropzone/basic.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Scafol</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light bg-dark">
            <div class="container-fluid">
                <div class="icon-left p-4">
                    <a class="navbar-brand" href="#">
                        <img src="<?= base_url() ?>/assets/img/logo.png" alt="" width="140" class="d-inline-block align-text-top">
                </div>
                <div class="icon-right">
                    <a href="<?= base_url() ?>auth/logout" class="btn btn-warning"><i class="fa fa-power-off" data-toggle="tooltip" data-placement="bottom" title="Tooltip on top"></i></a>
                </div>
                </a>
            </div>
        </nav>
    </div>
    <div class="container">
        <section class="sisi-atas">
            <div class="add-button">
                <button type="button" class="btn btn-warning fs-5 fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Diskusi</button>
            </div>
            <div class="r-side">
                <input class="form-input" placeholder="Cari diskusi . . .">
                <button class="btn btn-default dropdown-toggle fs-6 fw-bold" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter By
                </button>
                <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Terbaru</a></li>
                    <li><a class="dropdown-item" href="#">Terpopuler</a></li>
                    <li><a class="dropdown-item" href="#">Terlama</a></li>
                </ul>
            </div>
        </section><br>

        <!-- Modal Tambah Diskusi -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold p-2" id="exampleModalLabel">Tambah Diskusi Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="<?= base_url() ?>/auth/posting_diskusi" enctype="multipart/form-data" method="post">
                            <input class="form-control p-3 mb-3 fw-bold" name="title" type="text" placeholder="Tulis judul diskusi disini . . . " required>
                            <div class="form-floating">
                                <textarea class="form-control fw-bold mb-3" name="deskripsi" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2" class="text-secondary">Tulis deskripsi diskusi disini . . . </label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01"><i class="fa fa-paperclip fs-3"></i></label>
                                    <input type="file" name="file" class="form-control" id="inputGroupFile01">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01"><i class="fa fa-image fs-4"></i></label>
                                    <input type="file" name="foto" class="form-control" id="inputGroupFile01">
                                </div>
                            </div>
                            <select class="form-select mt-3" name="kategori" required>
                                <option selected disabled value="">-- Pilih Kategori --</option>
                                <option value="jembatan">Jembatan</option>
                                <option value="jalan">Jalan</option>
                                <option value="bangunan">Bangunan</option>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Post Diskusi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>