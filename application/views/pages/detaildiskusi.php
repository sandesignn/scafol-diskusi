<a class="text-warning" href="<?= base_url('auth/home') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
<section class="mt-4 mb-5">
    <div class="row kotak-posting mb-2">
        <div class="col-sm-1 foto-profile">
            <img src="<?= base_url() ?>/assets/img/foto-profiles/man.png" alt="" class="img-profile" width="80">
        </div>
        <div class="col-sm">
            <div class="row mb-5">
                <h6 class="fw-bold"><?= $detail['nama'] ?><span class="badge bg-warning fw-normal text-dark mr-3"> - (<?= $detail['created_at'] ?>)</span></h6>
                <h5 class="fs-8 text-default fw-bold"><?= $detail['title'] ?></h5>
                <p><?= $detail['deskripsi'] ?></p>
                <h5 class="fw-bold"><?= $jkomentar ?> Jawaban</h5>
                <form action="<?= base_url() ?>/auth/posting_komentar" method="post" enctype="multipart/form-data">
                    <div class="form-floating">
                        <input type="hidden" name="id_diskusi" class="form-control" id="inputGroupFile01" value="<?= $detail['id_diskusi'] ?>">
                        <textarea class="form-control fw-bold mb-2" name="komentar" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 120px"></textarea>
                        <label class="text-secondary fs-6 pl-4" for="floatingTextarea2">Tulis Komentar Anda Disini. . .</label>
                        <div class="l-side">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupFile01"><i class="fa fa-paperclip fs-3"></i></label>
                                <input type="file" name="file" class="form-control" id="inputGroupFile01">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupFile01"><i class="fa fa-image fs-4"></i></label>
                                <input type="file" name="foto" class="form-control" id="inputGroupFile01">
                            </div>
                        </div>
                        <div class="r-side">
                            <button type="submit" class="btn btn-warning fs-5 fw-bold"><i class="fa fa-plus" aria-hidden="true"></i> Post Komentar</button>
                        </div>
                    </div>
                </form>
            </div>

            <?php foreach ($komentar as $kmt) : ?>
                <div class="row">
                    <div class="col-sm-1">
                        <img src="<?= base_url() ?>/assets/img/foto-profiles/man.png" alt="" class="img-profile-replay">
                    </div>
                    <div class="col-sm">
                        <div class="row mb-4">
                            <h6 class="fw-bold"><?= $kmt['username'] ?><span class="badge bg-warning fw-normal text-dark">- (<?= $kmt['created_at'] ?>)</span></h6>
                            <p class="fs-6 text-secondary"><?= $kmt['komentar_user'] ?></p>
                            <?php

                            if ($kmt['img']) { ?>

                                <h5 class="fw-bold">Attachment Gambar</h5>
                                <div class="img-attch mb-4">
                                    <img style="width: 200px;" src="<?= base_url() ?>/assets/img/attachment/<?= $kmt['img'] ?>" alt="">
                                </div>
                            <?php
                            }
                            if ($kmt['file']) { ?>

                                <h5 class="fw-bold">Attachment File</h5>
                                <div class="img-attch mb-4">
                                    <a class="fw-bold" href="<?= base_url() ?>/assets/img/attachment/<?= $kmt['file'] ?>" download><?= $kmt['file'] ?></a>
                                </div>
                            <?php
                            }
                            ?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalkomentar"><small class="text-warning fw-bold">Balas</small></a>
                        </div>

                        <!-- Modal Tambah Diskusi -->
                        <div class="modal fade" id="exampleModalkomentar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold p-2" id="exampleModalLabel">Tambah Komentar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form action="<?= base_url() ?>/auth/balas_komentar" enctype="multipart/form-data" method="post">
                                            <div class="form-floating">
                                                <input type="hidden" name="id_komentar" value="<?= $kmt['id_komentar'] ?>">
                                                <input type="hidden" name="id_diskusi" value="<?= $kmt['id_diskusi'] ?>">
                                                <textarea class="form-control fw-bold mb-3" name="komentar" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2" class="text-secondary">Tulis komentar Anda disini . . . </label>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupFile01"><i class="fa fa-paperclip fs-3"></i></label>
                                                    <input type="file" name="file" class="form-control" id="inputGroupFile01">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupFile01"><i class="fa fa-image fs-4"></i></label>
                                                    <input type="file" name="foto" class="form-control" id="inputGroupFile01">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-warning">Post Komentar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 
                        <div class="row mb-4">
                            <div class="col-sm-1 foto-profile">
                                <img src="<?= base_url() ?>/assets/img/foto-profiles/sandiwht.jpg" alt="" class="img-profile-replay-replay">
                            </div>
                            <div class="col-sm">
                                <h6 class="fw-bold">Kurnia Sandi Pratama<span class="badge bg-warning fw-normal text-dark">- (27-Mei-2021)</span></h6>
                                <p class="fs-8 text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, dicta quidem placeat, quo atque aspernatur, numquam quae ipsum minus provident minima ex illum asperiores maiores?</p>
                                <a href="#"><small class="text-warning fw-bold">Balas</small></a>
                            </div>
                        </div> -->
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>

</section>