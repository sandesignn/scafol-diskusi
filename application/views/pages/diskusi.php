<section class="mt-4">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php foreach ($diskusi as $dks) : ?>
        <div class="row kotak-posting">
            <div class="col-sm-1 foto-profile">
                <img src="<?= base_url() ?>/assets/img/foto-profiles/sandiwht.jpg" alt="" class="img-profile" width="80">
            </div>
            <div class="col-sm">
                <h6 class="fw-bold"><?= $dks['nama'] ?><span class="badge bg-warning fw-normal text-dark">- (<?= $dks['created_at'] ?>)</span></h6>
                <p class="fs-8 fw-bold text-dark"><a class="fs-8 fw-bold text-dark" href="<?= base_url() ?>auth/diskusi/<?= $dks['id_diskusi'] ?>"><?= $dks['title'] ?></a></p>
            </div>
            <div class="col-sm-1 mt-5">
                <a href="<?= base_url() ?>auth/diskusi/<?= $dks['id_diskusi'] ?>"> <i class="material-icons text-warning fs-2">chat</i></a><span class="fw-bold">3</span>
            </div>
        </div>
    <?php endforeach ?>
</section>
</div>
</div>