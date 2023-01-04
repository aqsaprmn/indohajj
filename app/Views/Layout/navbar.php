<nav class="navbar nav-home bg-dongker-2 z-index-100 w-100 mx-0 position-fixed navbar-expand-lg p-0 transition-3">
    <div id="nav-all" class="container-fluid mx-0 h-100 position-relative px-0">
        <div class="navbar-brand bg-white h-100 rounded-bottom-right d-flex justify-content-center align-items-center overflow-visible ps-2 ps-sm-3 pe-5 me-0">
            <a class="" href="<?= base_url() ?>"><img class="nav-logo" src="<?= base_url() ?>/public/asset/img/logoindohajj.png" alt=""></a>
        </div>
        <button class="navbar-toggler btn-active-non-outline border border-white me-2 rounded-1 order-lg-2 order-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse w-100 h-100 navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav bg-dongker-2 menu mx-auto px-0 transition-3">
                <li class="nav-item mx-2">
                    <a class="nav-link py-lg-0 py-2 text-center <?=
                                                                ($active == 'home') ? 'text-orange text-bold' : "text-white";

                                                                ?> white-space-nowrap" href="<?= base_url() ?> ">Home</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link py-lg-0 py-2 text-center <?=
                                                                ($active == 'umrah') ? 'text-orange text-bold' : "text-white";
                                                                ?> white-space-nowrap" href="<?= base_url() ?>/umrah/">Paket Umrah</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link py-lg-0 py-2 text-center <?=
                                                                ($active == 'penerbangan') ? 'text-orange text-bold' : "text-white";
                                                                ?> white-space-nowrap" href="<?= base_url() ?>/penerbangan/">Penerbangan</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link py-lg-0 py-2 text-center <?=
                                                                ($active == 'hotel') ? 'text-orange text-bold' : "text-white";
                                                                ?> white-space-nowrap" href="<?= base_url() ?>/hotel/">Hotel</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link py-lg-0 py-2 text-center <?=
                                                                ($active == 'visa') ? 'text-orange text-bold' : "text-white";
                                                                ?> white-space-nowrap" href="<?= base_url() ?>/visa/">Visa</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link py-lg-0 py-2 text-center <?=
                                                                ($active == 'haji') ? 'text-orange text-bold' : "text-white";
                                                                ?> white-space-nowrap" href="<?= base_url() ?>/haji/">Paket Haji</a>
                </li>
            </ul>
        </div>
        <?php if (isset($ceklogin) && $ceklogin['logged_in']) : ?>
            <div id="logged-in" class="bg-white h-100 px-2 rounded-start d-flex justify-content-center">
                <div class="btn-group">
                    <div class="dropdown-toggle d-flex justify-content-between align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                        <div style="width: 48px; height: 48px" class="position-relative me-2 rounded-circle border border-dark">
                            <img class="w-100 h-100" src="<?= base_url() ?>/public/asset/img/<?= $ceklogin['userdata']['image'] ?>" alt="">
                        </div>
                        <div class="me-2">
                            <div style="width: 100px;" class="overflow-x-auto"><?= $ceklogin['userdata']['name'] ?></div>
                            <small class="text-secondary"><?= ($ceklogin['user']['role_id'] == "AGN") ? "Agent" : "Individual" ?></small>
                        </div>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url() ?>/profile/">Profil</a></li>
                        <li><a class="dropdown-item" href="<?= base_url() ?>/editprofile/">Edit Profil</a></li>
                        <li><a class="dropdown-item" href="#">Ganti Password</a></li>
                        <li><a class="dropdown-item" href="<?= base_url() ?>/informasiReservasi">Informasi Reservasi</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= base_url() ?>/user/logout">Log Out</a></li>
                    </ul>
                </div>
            </div>
        <?php else : ?>
            <div id="logged-out" class="bg-dongker-2 h-100 px-md-4 px-0 d-flex justify-content-center align-items-center transition-3 order-lg-3 order-2">
                <div class="dropdown d-sm-none">
                    <button class="btn btn-dongker rounded-1 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Login/Daftar
                    </button>
                    <ul class="dropdown-menu p-2">
                        <li class="mb-2">
                            <a href="<?= base_url() ?>/user/login" class="btn btn-dongker white-space-nowrap w-100">
                                <i class="fa-solid fa-right-to-bracket"></i> Login
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-light white-space-nowrap w-100" href="<?= base_url() ?>/user">
                                <i class="fa-solid fa-user"></i> Daftar
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="d-sm-flex d-none">
                    <ul class="d-flex px-0 m-0 justify-content-center align-items-center">
                        <li class="mx-1 d-inline-block">
                            <a href="<?= base_url() ?>/user/login" class="btn btn-dongker white-space-nowrap">
                                <i class="fa-solid fa-right-to-bracket"></i> Login
                            </a>
                        </li>
                        <li class="mx-1 d-inline-block">
                            <a class="btn btn-light white-space-nowrap" href="<?= base_url() ?>/user">
                                <i class="fa-solid fa-user"></i> Daftar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        <?php endif; ?>
    </div>
</nav>