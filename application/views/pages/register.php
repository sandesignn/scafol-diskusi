<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <!-- Countdown-->
    <!-- <link type="text/css" href="<?= base_url() ?>asset/js/countdown/jquery.countdown.css?v=1.0.0" rel="stylesheet"> -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Call sweet alert -->
    <!-- <script src="<?= base_url('asset/'); ?>/js/sweet/sweetalert2.all.min.js"></script> -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main.css" />
    <title>Login iVote</title>
</head>

<body>
    <!-- Main Container -->
    <div class="mymain-container">
        <div class="kotak_register">
            <p class="tulisan_login">Register <br><b>Akun Scafol</b></p>


            <form action="<?= base_url('auth/register_work'); ?>" method="post">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <label class="form_name"><b>Nama Lengkap</b></label>
                <br>
                <input type="text" name="nama" class="form_login" placeholder="ex: Kurnia Sandi xxxx">
                <label class="form_name"><b>Username</b></label>
                <br>
                <input type="text" name="username" class="form_login" placeholder="ex: sandixxxx">
                <label class="form_name"><b>Email</b></label>
                <br>
                <input type="email" name="email" class="form_login" placeholder="ex: user@mail.com">

                <label class="form_name"><b>Password</b></label>
                <input type="password" name="password" class="form_login" placeholder="password...">

                <input type="submit" name="btn-go" class="tombol_login form_name" value="Daftar Akun">

                <br />
                <p class="form_name">Sudah punya akun?<a class="link" href="<?= base_url() ?>auth"><b> Masuk Sekarang</b></a></p>

            </form>

        </div>

    </div>
    <!-- End Main Container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4447724730.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Sweet Alert -->
    <script>
        const flashDataRegis = $('.flash-data').data('flashdata');
        if (flashDataRegis) {
            Swal.fire(
                'Yeyy Berhasil!',
                +flashDataRegis,
                'success'
            )
        }
    </script>
</body>

</html>