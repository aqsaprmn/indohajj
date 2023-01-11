<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('user')) : ?>
    <div id="Mlogin" class="d-none">
        <?= session()->getFlashdata('user'); ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('logout')) : ?>
    <div id="Mlogout" class="d-none">
        <?= session()->getFlashdata('logout'); ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div id="Mregist" class="d-none">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<script>
    const Mregist = document.getElementById('Mregist');
    if (Mregist) {
        if (Mregist.innerHTML.trim() == "suksesagent") {
            Swal.fire({
                title: "Daftar Berhasil",
                text: "Pendaftaran agent berhasil, perhatikan email untuk persetujuan akun anda",
                icon: "success",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url() ?>/user/login';
                } else {
                    window.location.href = '<?= base_url() ?>/user/login';
                }
            });
        } else if (Mregist.innerHTML.trim() == "suksesindi") {
            Swal.fire({
                title: "Daftar Berhasil",
                text: "Pendaftaran individu berhasil, silahkan login!",
                icon: "success",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url() ?>/user/login';
                } else {
                    window.location.href = '<?= base_url() ?>/user/login';
                }
            });
        } else {
            Swal.fire({
                title: "Daftar Gagal",
                text: "Pendaftaran gagal",
                icon: "error",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url() ?>/user/role';
                } else {
                    window.location.href = '<?= base_url() ?>/user/role';
                }
            });
        }
    }

    const Mlogin = document.getElementById('Mlogin');
    if (Mlogin) {
        Swal.fire({
            title: "Login Sukses",
            text: "Login sukses, silahkan menjelajah!",
            icon: "success",
        });
    }

    const Mlogout = document.getElementById('Mlogout');
    if (Mlogout) {
        Swal.fire({
            title: "Logout Sukses",
            text: "Logout sukses, terima kasih sudah berkunjung!",
            icon: "success",
        });
    }
</script>
<!-- <div id="message" class="d-none">
    sukses
</div> -->
<!-- Carosul -->
<!-- <div id="carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner h-100">
        <div class="carousel-item active caro-img">
            <img src="<?= base_url() ?>/public/asset/img/mekah.jpeg" class="d-block w-100" alt="Makkah">
        </div>
        <div class="carousel-item caro-img">
            <img src="<?= base_url() ?>/public/asset/img/masjid nabawi.jpeg" class="d-block w-100" alt="Masjid Nabawi">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> -->
<!-- End Carosul -->
<!-- Banner Head -->
<div class="bg-white p-5 position-relative">
    <div class="row mx-0">
        <div class="col-md-5 col-lg-7 mb-md-0 mb-5 d-flex text-md-start text-center flex-column justify-content-center">
            <div class="mb-4 text-dongker">
                <h2 class=" fw-semibold">Teknologi, Cepat, dan langsung berangkat dengan siap</h2>
            </div>
            <div class="mb-4 text-secondary">
                <p>Dengan proses serba digital semua dapat dilakukan dengan cepat dan mudah. Berfokus kepada siapapun yang ingin berangkat <span class="fw-bold">Haji-Umroh-Tour & Travel</span> dengan proses yang tidak ribet. Banyak paket yang tersedia untuk pemilihan yang lebih cepat dan akurat.</p>
            </div>
            <div>
                <button class="btn btn-orange shadow-lg px-4 py-2">Lanjut Baca <i class="ms-2 fa-solid fa-arrow-down"></i></button>
            </div>
        </div>
        <div class="col-md-7 p-0 col-lg-5 d-flex justify-content-center">
            <div class="position-relative banner-ilustrasi">
                <img class="w-100" src="<?= base_url(); ?>/public/asset/img/kabahilustrat.jpeg" alt="">
            </div>
        </div>
    </div>
</div>
<!-- End Banner Head -->

<!-- Service -->
<div class="banner-service p-5 position-relative">
    <div class="row mx-0 position-relative">
        <div class="col-lg-3 col-md-6 service-list p-2">
            <a href="<?= base_url() ?>/umrah">
                <div class="list w-100 h-100 bg-white rounded-3 p-4">
                    <div class="mb-3 fs-2 text-orange">
                        <i class="fa-solid fa-mosque"></i>
                    </div>
                    <div class="mb-3">
                        <h5 class="fw-semibold">Umrah</h5>
                    </div>
                    <div class="fs-14 text-secondary">
                        <span>Menyediakan banyak paket umrah untuk keberangkatan jamaah dengan proses yang mudah</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 service-list p-2">
            <a href="<?= base_url() ?>/haji">
                <div class="list w-100 h-100 bg-white rounded-3 p-4">
                    <div class="mb-3 fs-2 text-orange">
                        <i class="fa-solid fa-kaaba"></i>
                    </div>
                    <div class="mb-3">
                        <h5 class="fw-semibold">Haji</h5>
                    </div>
                    <div class="fs-14 text-secondary">
                        <span>Menyediakan banyak paket haji untuk keberangkatan jamaah dengan proses yang mudah</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 service-list p-2">
            <a href="<?= base_url() ?>/penerbangan">
                <div class="list w-100 h-100 bg-white rounded-3 p-4">
                    <div class="mb-3 fs-2 text-orange">
                        <i class="fa-solid fa-plane-departure"></i>
                    </div>
                    <div class="mb-3">
                        <h5 class="fw-semibold">Penerbangan</h5>
                    </div>
                    <div class="fs-14 text-secondary">
                        <span>Penerbangan kemanapun dan kapanpun dengan berbagai maskapai yang diinginkan dengan cepat</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 service-list p-2">
            <a href="<?= base_url() ?>/hotel">
                <div class="list w-100 h-100 bg-white rounded-3 p-4">
                    <div class="mb-3 fs-2 text-orange">
                        <i class="fa-solid fa-hotel"></i>
                    </div>
                    <div class="mb-3">
                        <h5 class="fw-semibold">Hotel</h5>
                    </div>
                    <div class="fs-14 text-secondary">
                        <span>Menginap di hotel impian dengan fasilitas yang menarik serta proses booking yang mudah</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- End Service -->

<!-- Aboute Us -->
<div class="position-relative">

</div>
<!-- End About Us -->

<!-- Best Deals -->
<div class="best py-5">
    <div class="best-container">
        <div class="best-title pb-5 text-center">
            <h1><span class="text-b-brown">Hotel</span> <span class="text-b-blue">Penawaran Terbaik</span></h1>
        </div>
        <div class="row px-md-5 px-2 mx-0">
            <div class="col-md-3 mb-md-0 mb-3 d-flex justify-content-center">
                <div class="card" style="width: 24rem;">
                    <a href="<?= base_url() ?>hotel/"><img src="<?= base_url() ?>/public/asset/img/hilton.jpeg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">Hilton Makkah Conventional Hotel</h5>
                        <p class="card-text"><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h6><b>Jarak:</b></h6>
                            <div>
                                <span><img class="icon-ma makkah mb-1" src="<?= base_url() ?>/public/asset/img/makkah.png" alt=""> <b>Makkah:</b> 100 meter</span>
                            </div>
                            <div>
                                <span><img class="icon-ma madinah mb-2" src="<?= base_url() ?>/public/asset/img/madinah.png" alt=""> <b>Madinah:</b> 200 meter</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h6><b>Fasilitas:</b></h6>
                            <div class="fasilitas">
                                <table>
                                    <tr>
                                        <td><i class="fa-solid fa-wifi"></i></td>
                                        <td>Wifi</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-utensils"></i></td>
                                        <td>Restoran</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-square-parking"></i></td>
                                        <td>Parkir Gratis</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-bell-concierge"></i></td>
                                        <td>Layanan Kamar</td>
                                    </tr>
                                </table>
                            </div>
                        </li>
                        <li class="list-group-item">Harga Mulai: <b>Rp. 1.567.217</b></li>
                    </ul>
                    <div class="card-body">
                        <a href="<?= base_url() ?>hotel/" class="card-link btn btn-primary">Booking Sekarang!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card" style="width: 24rem;">
                    <a href="<?= base_url() ?>hotel/"><img src="<?= base_url() ?>/public/asset/img//swissotel.jpeg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">Swissotel Al Maqam Makkah Hotel</h5>
                        <p class="card-text"><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star"></i></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h6><b>Jarak:</b></h6>
                            <div>
                                <span><img class="icon-ma makkah mb-1" src="<?= base_url() ?>/public/asset/img//makkah.png" alt=""> <b>Makkah:</b> 100 meter</span>
                            </div>
                            <div>
                                <span><img class="icon-ma madinah mb-2" src="<?= base_url() ?>/public/asset/img//madinah.png" alt=""> <b>Madinah:</b> 200 meter</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h6><b>Fasilitas:</b></h6>
                            <div class="fasilitas">
                                <table>
                                    <tr>
                                        <td><i class="fa-solid fa-wifi"></i></td>
                                        <td>Wifi</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-utensils"></i></td>
                                        <td>Restoran</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-square-parking"></i></td>
                                        <td>Parkir Gratis</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-bell-concierge"></i></td>
                                        <td>Layanan Kamar</td>
                                    </tr>
                                </table>
                            </div>
                        </li>
                        <li class="list-group-item">Harga Mulai: <b>Rp. 1.567.217</b></li>
                    </ul>
                    <div class="card-body">
                        <a href="<?= base_url() ?>hotel/" class="card-link btn btn-primary">Booking Sekarang!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card" style="width: 24rem;">
                    <a href="<?= base_url() ?>hotel/alkiswah"><img src="<?= base_url() ?>/public/asset/img//alkiswah.jpeg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">Al Kiswah Towers Hotel</h5>
                        <p class="card-text"><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h6><b>Jarak:</b></h6>
                            <div>
                                <span><img class="icon-ma makkah mb-1" src="<?= base_url() ?>/public/asset/img//makkah.png" alt=""> <b>Makkah:</b> 100 meter</span>
                            </div>
                            <div>
                                <span><img class="icon-ma madinah mb-2" src="<?= base_url() ?>/public/asset/img//madinah.png" alt=""> <b>Madinah:</b> 200 meter</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h6><b>Fasilitas:</b></h6>
                            <div class="fasilitas">
                                <table>
                                    <tr>
                                        <td><i class="fa-solid fa-wifi"></i></td>
                                        <td>Wifi</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-utensils"></i></td>
                                        <td>Restoran</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-square-parking"></i></td>
                                        <td>Parkir Gratis</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-bell-concierge"></i></td>
                                        <td>Layanan Kamar</td>
                                    </tr>
                                </table>
                            </div>
                        </li>
                        <li class="list-group-item">Harga Mulai: <b>Rp. 1.567.217</b></li>
                    </ul>
                    <div class="card-body">
                        <a href="<?= base_url() ?>hotel/" class="card-link btn btn-primary">Booking Sekarang!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card" style="width: 24rem;">
                    <a href="<?= base_url() ?>hotel/"><img src="<?= base_url() ?>/public/asset/img//infinity.jpeg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">Infinity Hotel Makkah</h5>
                        <p class="card-text"><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h6><b>Jarak:</b></h6>
                            <div>
                                <span><img class="icon-ma makkah mb-1" src="<?= base_url() ?>/public/asset/img//makkah.png" alt=""> <b>Makkah:</b> 100 meter</span>
                            </div>
                            <div>
                                <span><img class="icon-ma madinah mb-2" src="<?= base_url() ?>/public/asset/img//madinah.png" alt=""> <b>Madinah:</b> 200 meter</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h6><b>Fasilitas:</b></h6>
                            <div class="fasilitas">
                                <table>
                                    <tr>
                                        <td><i class="fa-solid fa-wifi"></i></td>
                                        <td>Wifi</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-utensils"></i></td>
                                        <td>Restoran</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-square-parking"></i></td>
                                        <td>Parkir Gratis</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-bell-concierge"></i></td>
                                        <td>Layanan Kamar</td>
                                    </tr>
                                </table>
                            </div>
                        </li>
                        <li class="list-group-item">Harga Mulai: <b>Rp. 1.567.217</b></li>
                    </ul>
                    <div class="card-body">
                        <a href="<?= base_url() ?>hotel/" class="card-link btn btn-primary">Booking Sekarang!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center pb-2 pt-5">
            <a href="<?= base_url() ?>/hotel/" class="btn-brown px-5 py-3 text-white text-decoration-none rounded">Lihat Hotel Lain</a>
        </div>
    </div>
</div>
<!-- End Best Deals -->
<!-- Iklan 1 -->
<div class="iklan-1 bg-info container-fluid p-5">
    <div class="row">
        <div class="col-md-6 p-5">
            <div class="rounded h-100 d-flex justify-content-center bg-white align-items-center">
                <a class="navbar-brand d-flex align-content-center" href="<?= base_url() ?>"><img style="width: 200px" class="" src="<?= base_url() ?>/public/asset/img/logoindohajj.png" alt=""></a>
                <!-- <a class="navbar-brand d-inline" href="#"><img style="width: 100%;" class="" src="<?= base_url() ?>/public/asset/img//logo.png" alt=""></a> -->
            </div>
        </div>
        <div class="col-md-6 text-white text-end py-5">
            <div class="fs-3">
                <span class="iklan-1-safina bg-b-brown py-2 px-3 rounded">INDOHAJJ</span> ADALAH PLATFORM UNTUK MELAKUKAN
            </div>
            <div class="fs-1">
                <b><span class="text-b-brown">PROSES PERJALANAN</span> HAJI-UMRAH-TOUR & TRAVEL</b>
            </div>
            <span class="fst-italic fs-3">DENGAN MUDAH DAN CEPAT</span>
        </div>
    </div>
</div>
<!-- End Iklan 1 -->
<!-- Best Deals -->
<div class="best py-5">
    <div class="best-container">
        <div class="best-title pb-5 text-center">
            <h1><span class="text-b-brown">Paket Umrah</span> <span class="text-b-blue">Populer</span></h1>
        </div>
        <div class="row px-3 mx-0">
            <div class="col-md-6 px-md-5 d-flex justify-content-center">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <img src="<?= base_url() ?>/public/asset/img//paketmekah1.jpeg" class="card-img-top mb-3" alt="...">
                        <h4 class="card-title bg-b-blue text-white text-center rounded p-1">Keberangkatan Flexibel</h4>
                        <h5 class="card-text lh-1">Oktober | 14 Malam | Termasuk Penerbangan</h5>
                        <p class="text-secondary mb-0 lh-1 fst-italic">Premium</p>
                        <small class="text-b-brown">Jeddah Airport <i class="fa-solid fa-circle-chevron-right"></i> Makkah <i class="fa-solid fa-circle-chevron-right"></i> Madinah <i class="fa-solid fa-circle-chevron-right"></i> Madinah Airport</small>
                        <hr>
                        <p class="text-decoration-underline">Termasuk: </p>
                        <div class="d-flex justify-content-between position-relative overflow-auto">
                            <span class="me-3">
                                <i class="fa-solid fa-plane fs-4"></i> Penerbangan
                            </span>
                            <span class="me-3">
                                <i class="fa-brands fa-cc-visa fs-4"></i> Visa
                            </span>
                            <span class="me-3">
                                <i class="fa-solid fa-car fs-4"></i> Transportasi
                            </span>
                            <span class="me-3">
                                <i class="fa-solid fa-hotel fs-4"></i> Hotel
                            </span>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-decoration-underline">Jarak: </p>
                                <div>
                                    <span><img class="icon-ma makkah mb-1" src="<?= base_url() ?>/public/asset/img//makkah.png" alt=""> <b>Makkah:</b> 100 meter</span>
                                </div>
                                <div>
                                    <span><img class="icon-ma madinah mb-2" src="<?= base_url() ?>/public/asset/img//madinah.png" alt=""> <b>Madinah:</b> 200 meter</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="text-decoration-underline">Total Peziarah: </p>
                                <div>
                                    <span><i class="fa-solid fa-user"></i> 40 Orang </span>
                                </div>
                            </div>
                            <hr>
                            <div class="">
                                <button class="btn-brown form-control rounded border-0 text-white p-2" data-bs-toggle="modal" data-bs-target="#bookingtiket">Booking Sekarang</button>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-b-brown text-white text-center">
                            <span>Rupiah <h3>2.500.000</h3></span>
                            <p class="fst-italic">Per Peziarah</p>
                            <p>Peziarah: <span class="bg-white text-black p-2 rounded">2</span> - <b>5.000.000</b> </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 px-md-5 d-flex justify-content-center">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <img src="<?= base_url() ?>/public/asset/img//paketmekah2.jpeg" class="card-img-top mb-3" alt="...">
                        <h4 class="card-title bg-b-blue text-white text-center rounded p-1">Keberangkatan Flexibel</h4>
                        <h5 class="card-text lh-1">September | 10 Malam | Tanpa Penerbangan</h5>
                        <p class="text-secondary mb-0 lh-1 fst-italic">Ekonomi</p>
                        <small class="text-b-brown">Jeddah Airport <i class="fa-solid fa-circle-chevron-right"></i> Makkah <i class="fa-solid fa-circle-chevron-right"></i> Madinah <i class="fa-solid fa-circle-chevron-right"></i> Madinah Airport</small>
                        <hr>
                        <p class="text-decoration-underline">Termasuk: </p>
                        <div class="d-flex justify-content-between">
                            <span class="me-3">
                                <i class="fa-brands fa-cc-visa fs-4"></i> Visa
                            </span>
                            <span class="me-3">
                                <i class="fa-solid fa-car fs-4"></i> Transportasi
                            </span>
                            <span class="me-3">
                                <i class="fa-solid fa-hotel fs-4"></i> Hotel
                            </span>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-decoration-underline">Jarak: </p>
                                <div>
                                    <span><img class="icon-ma makkah mb-1" src="<?= base_url() ?>/public/asset/img//makkah.png" alt=""> <b>Makkah:</b> 400 meter</span>
                                </div>
                                <div>
                                    <span><img class="icon-ma madinah mb-2" src="<?= base_url() ?>/public/asset/img//madinah.png" alt=""> <b>Madinah:</b> 800 meter</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="text-decoration-underline">Total Peziarah: </p>
                                <div>
                                    <span><i class="fa-solid fa-user"></i> 40 Orang </span>
                                </div>
                            </div>
                            <hr>
                            <div class="">
                                <button class="btn-brown form-control rounded border-0 text-white p-2" data-bs-toggle="modal" data-bs-target="#bookingtiket">Booking Sekarang</button>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-b-brown text-white text-center">
                            <span>Rupiah <h3>2.500.000</h3></span>
                            <p class="fst-italic">Per Peziarah</p>
                            <p>Peziarah: <span class="bg-white text-black p-2 rounded">2</span> - <b>5.000.000</b> </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="bookingtiket" tabindex="-1" aria-labelledby="bookingtiketLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingtiketLabel">Booking Paket Umroh - Premium</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body overflow-auto" style="height: 600px;">
                            <div class="mb-3 border-bottom">
                                <h5>Data Pribadi</h5>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="no" class="form-label">No Identitas</label>
                                <input type="text" class="form-control" id="no" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Laki - laki</option>
                                    <option value="1">Perempuan</option>
                                </select>
                            </div>
                            <!-- <div class="mb-3">
                                    <label for="bisnis" class="form-label">Tempat, Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="bisnis" placeholder="">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" id="bisnis" placeholder="">
                                        </div>
                                    </div>
                                </div> -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="telpon" class="form-label">Nomor Telpon</label>
                                <input type="text" class="form-control" id="telpon" placeholder="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="btnBooking" data-text="Paket Umroh" class="rounded border-0 py-2 px-2 btn-brown text-white">Booking Paket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center pb-2 pt-5">
            <a href="<?= base_url() ?>paketumroh" class="btn-brown px-5 py-3 text-white text-decoration-none rounded">Lihat Paket Umrah Lain</a>
        </div>
    </div>
</div>
<!-- End Best Deals -->
<!-- Layanan -->
<div class="border mb-5 border-2 rounded p-5 bg-grey">
    <div class="text-center pb-5">
        <h1><span class="text-b-brown">Layanan</span> <span class="text-b-blue">INDOHAJJ</span></h1>
    </div>
    <div class="row text-center">
        <div class="col-md-3 mb-4 mb-md-0 d-flex flex-column justify-content-center align-content-center">

            <div class=""><i class="fa-solid fa-sheet-plastic layanan-icon text-b-blue"></i></div>

            <div class="text-b-brown fs-4"><b>VISA UMRAH</b></div>
        </div>
        <div class="col-md-3 mb-4 mb-md-0 d-flex flex-column justify-content-center align-content-center">

            <i class="fa-solid fa-hotel layanan-icon text-b-blue"></i>

            <div class="text-b-brown fs-4"><b>HOTEL</b></div>
        </div>
        <div class="col-md-3 mb-4 mb-md-0 d-flex flex-column justify-content-center align-content-center">

            <i class="fa-solid fa-plane layanan-icon text-b-blue"></i>

            <div class="text-b-brown fs-4"><b>TIKET PESAWAT</b></div>
        </div>
        <div class="col-md-3 mb-4 mb-md-0 d-flex flex-column justify-content-center align-content-center">

            <i class="fa-solid fa-car layanan-icon text-b-blue"></i>

            <div class="text-b-brown fs-4"><b>TRANSPORTASI</b></div>
        </div>
    </div>
</div>
<div class="kontak">
    <!-- <div>Ikuti Terus Berita Safina</div> -->
    <div>
        <form action="">

        </form>
    </div>
</div>
<!-- End Layanan -->


<?= $this->endSection(); ?>