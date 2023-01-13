<nav style="height: 80px" class="navbar navbar-expand-lg bg-light position-fixed w-100 shadow">
    <div class="container-fluid p-0 fs-15">
        <div class="navbar-brand mx-3">
            <a class="" href="<?= base_url() ?>"><img class="nav-logo" src="<?= base_url() ?>/public/asset/img/logoindohajj.png" alt=""></a>
        </div>
        <button class="navbar-toggler mx-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse bg-light navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fw-medium">
                <li class="nav-item mx-2">
                    <a class="nav-link p-2 rounded-1 text-center <?=
                                                                    ($active == 'home') ? 'active' : "text-dark";

                                                                    ?> white-space-nowrap" href="<?= base_url() ?> ">Home</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link p-2 rounded-1 text-center <?=
                                                                    ($active == 'umrah') ? 'active' : "text-dark";
                                                                    ?> white-space-nowrap" href="<?= base_url() ?>/umrah/">Paket Umrah</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link p-2 rounded-1 text-center <?=
                                                                    ($active == 'penerbangan') ? 'active' : "text-dark";
                                                                    ?> white-space-nowrap" href="<?= base_url() ?>/penerbangan/">Penerbangan</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link p-2 rounded-1 text-center <?=
                                                                    ($active == 'hotel') ? 'active' : "text-dark";
                                                                    ?> white-space-nowrap" href="<?= base_url() ?>/hotel/">Hotel</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link p-2 rounded-1 text-center <?=
                                                                    ($active == 'visa') ? 'active' : "text-dark";
                                                                    ?> white-space-nowrap" href="<?= base_url() ?>/visa/">Visa</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link p-2 rounded-1 text-center <?=
                                                                    ($active == 'haji') ? 'active' : "text-dark";
                                                                    ?> white-space-nowrap" href="<?= base_url() ?>/haji/">Paket Haji</a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
            </ul>
            <hr class="">
            <div class="mx-3">
                <?php if (isset($ceklogin) && $ceklogin['logged_in']) : ?>
                    <div class="btn-group d-flex justify-content-center dropdown-center my-3 my-lg-0">
                        <button type="button" class="btn btn-gray dropdown-toggle d-flex justify-content-center align-items-center" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <div class="us-profile position-relative">
                                <img class="w-100 h-100" src="<?= base_url() ?>/public/asset/profil/<?= $ceklogin['userdata']['image']; ?>" alt="<?= $ceklogin['userdata']['name']; ?>">
                            </div>
                            <div style="font-size: 15px;" class="us-name text-start px-3 text-truncate text-dongker fw-medium">
                                <?php
                                $nama = explode(' ', $ceklogin['userdata']['name']);
                                ?>
                                <?= $nama[0]; ?>
                            </div>
                        </button>
                        <ul style="font-size: 15px;" class="dropdown-menu dropdown-menu-lg-end">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="<?= base_url() ?>/profile/"><i class="fa-solid fa-user me-3 text-dongker"></i> <span>Profil</span></a>
                            </li>
                            <!-- <li><a class="dropdown-item" href="<?= base_url() ?>/editprofile/">Edit Profil</a></li>
                            <li><a class="dropdown-item" href="#">Ganti Password</a></li> -->
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="<?= base_url() ?>/informasiReservasi"><i class="fa-solid fa-receipt me-3 text-dongker"></i> <span>Reservasi</span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex" href="<?= base_url() ?>/user/logout"><i class="fa-solid fa-arrow-right-from-bracket me-3 text-dongker"></i>Log Out</a>
                            </li>
                        </ul>
                    </div>
                <?php else : ?>
                    <div id="logged-out" class="h-100 px-0 d-flex justify-content-center align-items-center my-3 my-lg-0">
                        <ul class="d-flex px-0 m-0 justify-content-center align-items-center">
                            <li class="mx-1 d-inline-block">
                                <a href="<?= base_url() ?>/user/login" class="btn us-login border border-secondary text-secondary white-space-nowrap px-3">
                                    Login<i class="fa-solid fa-right-to-bracket ms-2"></i>
                                </a>
                            </li>
                            <li class="mx-1 d-inline-block">
                                <a class="btn btn-dongker white-space-nowrap px-3" href="<?= base_url() ?>/user">
                                    Daftar<i class="fa-solid fa-user ms-2"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>