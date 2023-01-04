<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('user')) : ?>
    <div id="Muser" class="d-none">
        <?= session()->getFlashdata('user'); ?>
    </div>
<?php endif; ?>
<div class="row mx-0 px-0 mb-5">
    <div class="login-data p-5 mt-4 col-lg-6">
        <div class="mb-4 px-lg-5 px-0">
            <!-- <a class="p-0" href="<?= base_url() ?>"><img class="nav-logo" src="<?= base_url() ?>/public/asset/img/logoindohajj.png" alt=""></a> -->
            <i class="fa-solid fa-bolt-lightning fs-1"></i>
        </div>
        <div class="mb-4 px-lg-5 px-0">
            <h4>
                Login
            </h4>
            <small class=" text-secondary">Segera login untuk mendaftar umrah dan haji!</small>
        </div>
        <form action="<?= base_url() ?>/user/cekLogin" method="POST" class="mb-5 px-lg-5 px-0">
            <div class="mb-4">
                <label for="id" class="form-label"><b>Email</b> <small class="text-secondary">atau</small> <b>Username</b> <small class="text-secondary">atau</small> <b>No. Telepon</b><sup>*</sup> </label>
                <input type="text" class="form-control rounded-5 py-3 px-4" id="id" name="id" placeholder="Masukkan email atau username atau no. telepon" required>
            </div>
            <div class="mb-4">
                <label for="pass" class="form-label"><b>Password<sup>*</sup></b></label>
                <div class="position-relative password">
                    <input type="password" class="form-control pe-5 ps-4 py-3 rounded-5" id="password" name="password" placeholder="Masukkan password" required>
                    <a href="" class="see h-100 d-flex align-items-center text-decoration-none"><i class="fa-solid fa-eye-slash"></i></a>
                    <!-- <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div> -->
                </div>
            </div>
            <div class="row mx-0 mb-4">
                <div class="col-sm-6 text-sm-start text-center mb-3">
                    <input id="remember" type="checkbox" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div class="col-sm-6 text-sm-end text-center">
                    <a href="">Lupa password?</a>
                </div>
            </div>

            <div class="row m-0">
                <button type="submit" class="btn btn-dongker rounded-5 py-3 px-4">Login</button>
            </div>
        </form>

    </div>
    <div id="" class="login-backdrop rounded-1 col-lg-6 d-flex flex-column justify-content-end align-items-center py-4">
        <div class="bg-light p-3 rounded-5 mb-5">
            <a class="p-0" href="<?= base_url() ?>"><img class="nav-logo" src="<?= base_url() ?>/public/asset/img/logoindohajj.png" alt=""></a>
        </div>
        <div class="w-100">
            <ul class=" position-relative sosmed">
                <li class="sosmed-list ">
                    <a href="" class="bg-danger sos-hover text-white">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li class="sosmed-list">
                    <a href="" class="bg-primary sos-hover text-white">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </li>
                <li class="sosmed-list">
                    <a href="" class="bg-info sos-hover text-white">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </li>
                <li class="sosmed-list">
                    <a href="" class="bg-danger sos-hover text-white">
                        <i class="fa-solid fa-g"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="px-lg-5 px-0 text-center">
            <p class="text-white fs-5">Belum terdaftar? </p>
            <a href="<?= base_url() ?>/user" class="btn btn-warning rounded-5 px-5 py-3">Buat akun</a>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>