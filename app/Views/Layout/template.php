<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Indohajj - <?= $title ?></title>

    <link rel="shortcut icon" href="<?= base_url() ?>/public/asset/img/indohajj.png" type="image/x-icon">

    <!-- Vendor -->
    <link rel="stylesheet" href="<?= base_url() ?>/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/asset/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/asset/vendor/sweetalert/dist/sweetalert2.css">


    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/asset/css/style.css">

    <!-- Jquery -->
    <script src="<?= base_url() ?>/public/asset/js/jquery.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/asset/vendor/DataTables/datatables.css" />
    <script src="<?= base_url() ?>/public/asset/vendor/DataTables/datatables.js"></script>

    <!-- Sweetalert -->
    <script src="<?= base_url() ?>/public/asset/vendor/sweetalert/dist/sweetalert2.all.js"></script>
</head>

<body class="p-0">
    <div class="wrapper">
        <!-- Navbar -->
        <?= $this->include('Layout/navbar') ?>

        <!-- End Navbar -->

        <div class="pt-80">
            <?= $this->renderSection('content'); ?>
        </div>

        <!-- Email -->
        <div class="p-5 bg-grad-ocean mb-5">
            <div class="text-center mb-5">
                <h2><span class="text-orange">JANGAN PERNAH LEWATKAN</span> <span class="text-white">INFO TENTANG KAMI!</span></h2>
            </div>
            <div class="row mx-0 px-0 justify-content-center">
                <div class="col-md-6">
                    <div class="input-group mb-3 m-auto">
                        <input type="text" class="form-control p-3 fs-5 fs-md" placeholder="Email" aria-label="Email" aria-describedby="button-addon2">
                        <button class="btn btn-sea fs-5" type="button" id="button-addon2">Berlangganan Sekarang!</button>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Email -->
        <!-- Footer -->
        <footer class="bg-grad-ocean">
            <div class="row p-5 mx-0">
                <div class="col-md-6 mb-md-0 mb-4">
                    <div class="mb-4">
                        <a class="navbar-brand d-flex align-content-center" href=" <?= base_url() ?>"><img style="width: 120px;" class="" src="<?= base_url() ?>/public/asset/img/logoindohajj.png" alt=""></a>
                    </div>
                    <div class="pe-md-5 me-md-5 text-justify">Indohajj adalah sebuah perusahaan yang bergerak dibidang pelayanan jasa untuk proses perjalanan Haji-Umroh-Tour & Travel. Indohajj didirikan pada tahun 2022 yang dimana perusahaan ini berfokus pada beberapa layanan diantaranya adalah pembuatan Visa Umrah, Pembelian Tiket Pesawat, Menyewa Kamar Hotel dan Transportasi.</div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="px-2 pb-2">
                        <h3><b>Kontak Kami</b></h3>
                    </div>
                    <div>
                        <table>
                            <tr>
                                <td class="px-2 text-center"><i class="fa-brands fa-whatsapp fs-4"></i></td>
                                <td><b>+62 812-8000-916</b></td>
                            </tr>
                            <tr>
                                <td class="px-2 text-center"><i class="fa-solid fa-envelope fs-4"></i></td>
                                <td><b>info1@indohajj.com</b></td>
                            </tr>
                            <tr>
                                <td class="px-2 text-center"><i class="fa-solid fa-location-dot fs-4"></i></td>
                                <td><b>Menara MTH , Jl. Letjen MT. Haryono Kav. 23 , Jakarta. Tebet, Jakarta.</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="px-2 pb-2">
                        <h3><b>Ikuti Kami</b></h3>
                    </div>
                    <div>
                        <table>
                            <tr>
                                <td class="px-2"><a href=""><i class="fa-brands fa-facebook fs-1 text-primary"></i></a></td>
                                <td class="px-2"><a href=""><i class="fa-brands fa-twitter fs-1 text-info"></i></a></td>
                                <td class="px-2"><a href=""><i class="fa-brands fa-instagram fs-1 text-danger"></i></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <hr class="m-0">
            <div class="row mx-0 p-3">
                <div class="text-center">Copyright 2022 © Indohajj. Seluruh Hak Cipta.</div>
            </div>

        </footer>
        <!-- End Footer -->

    </div>

    <!-- <script src="https://unpkg.com/tesseract.js@v2.0.2/dist/tesseract.min.js"></script> -->
    <!-- Bootstrap JS -->
    <script src="<?= base_url() ?>/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <!-- <script src="<?= base_url() ?>/vendor/twbs/bootstrap/dist/js/bootstrap.js"></script> -->

    <!-- <script src="<?= base_url() ?>/public/asset/vendor/fontawesome/js/all.js"></script> -->

    <?php
    if (isset($script)) {
        echo $script;
    }
    ?>

</body>

</html>