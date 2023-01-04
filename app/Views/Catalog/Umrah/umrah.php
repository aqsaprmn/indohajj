<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<!-- <?php if (session()->getFlashdata('pesan')) : ?>
    <div id="message" class="d-none">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?> -->
<div class="">
    <!-- <div class="px-5 mb-3">
        <h3><span class="text-black">Paket</span>
            <spa class="text-orange">Umroh</spa>
        </h3>
    </div> -->
    <div class="position-relative">
        <!-- <img src="<?= base_url() ?>/public/asset/img/panah.png" alt="" class="aksen position-absolute w-100"> -->
        <div class="banner-umrah position-relative pt-5">
            <!-- <img class="aksen-umrah position-absolute" src="<?= base_url() ?>/public/asset/img/aksenoren.png" alt=""> -->
            <div id="search" class="d-flex justify-content-center flex-column align-items-center px-0">
                <div class="px-0 col-10 col-md-8">
                    <form class="rounded-5 mb-5 p-4 bg-grad-waves" action="<?= base_url() ?>/umrah/paketumrah" method="post">
                        <div class="row mx-0">
                            <div class="col-md-3 mb-3 mb-md-0">
                                <label for="periode" class="form-label  text-dongker"><b>Periode</b></label>
                                <select class="form-select rounded-5" id="periode" name="periode" aria-label="">
                                    <option selected value="all">Pilih Periode</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3 mb-md-0">
                                <label for="tipe" class="form-label text-dongker "><b>Tipe Paket</b></label>
                                <select class="form-select rounded-5" id="tipe" name="tipe" aria-label="tipe">
                                    <option selected value="all">Pilih Tipe Paket</option>
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Premium">Premium</option>
                                    <!-- <option value="3">Budget</option> -->
                                </select>
                            </div>
                            <div class="col-md-3 mb-3 mb-md-0">
                                <label for="peziarah" class="form-label text-dongker"><b>Jamaah</b></label>
                                <select class="form-select rounded-5" id="peziarah" name="peziarah" aria-label="peziarah">
                                    <option selected value="all">Total Jamaah</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="peziarah" class="form-label"><b>Cari</b></label>
                                <button type="submit" class="btn btn-outline-dongker rounded-5 m-0 form-control" id="submit">Cari <i class="fa-solid fa-magnifying-glass ms-1"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <div class="mb-3">
                            <small class="text-white">
                                Klik tombol dibawah untuk menemukan paket umrah yang sedang populer dibeli oleh para jamaah
                            </small>
                        </div>
                        <div class="mb-3">
                            <a href="#paketpopuler" class="btn btn-purple rounded-5 p-3" id="">
                                Paket Umrah Populer
                            </a>
                        </div>
                        <!-- <div class="fs-1 text-white">
                            <i class="fa-solid fa-arrow-down"></i>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 210">
            <path fill="#000028" fill-opacity="1" d="M0,64L26.7,85.3C53.3,107,107,149,160,160C213.3,171,267,149,320,133.3C373.3,117,427,107,480,122.7C533.3,139,587,181,640,197.3C693.3,213,747,203,800,181.3C853.3,160,907,128,960,133.3C1013.3,139,1067,181,1120,181.3C1173.3,181,1227,139,1280,122.7C1333.3,107,1387,117,1413,122.7L1440,128L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path>
        </svg> -->
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 210">
            <path fill="#000028" fill-opacity="1" d="M0,224L1440,96L1440,0L0,0Z"></path>
        </svg> -->
        <div id="paketpopuler" class="populer pt-5 mb-5 px-0 px-md-5">
            <div class="row mx-0 mb-3">
                <div class="col-md-6">
                    <h3 class="px-2 px-md-5"><span>Paket</span> <span class="text-orange">Umroh Populer</span></h3>
                </div>
                <div class="col-md-6 text-end">
                    <div class="px-2 px-md-5">

                        <a href="<?= base_url() ?>/umrah/paketumrah" class="btn btn-orange rounded-5">Lihat Semua <i class="fa-solid fa-list-ul ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="px-md-5 px-4">
                <div class="d-flex overflow-auto py-5">
                    <?php foreach ($datapaketumrah as $dpu) : ?>
                        <div class="justify-content-center col-md-5 me-4">
                            <div class="card rounded-5">
                                <div class="card-body">
                                    <!-- <img src="<?= base_url() ?>/public/asset/img/<?= $dpu['gambar'] ?>" class="card-img-top mb-3" alt="..."> -->
                                    <div class="position-relative mb-3 mt-2">
                                        <span class="card-title text-bg-sea text-center rounded-5 p-2"><?= $dpu['nama'] ?></span>
                                    </div>
                                    <div style="height: 48px;" class="text-dongker mb-1 overflow-auto">
                                        <h5 class="card-text"><b><?= $dpu['sub_nama'] ?></b></h5>
                                    </div>
                                    <div class="text-secondary mb-2 fst-italic">
                                        <small class=""><?= $dpu['tipe'] ?></small>
                                    </div>
                                    <div class="overflow-auto" style="height: 48px;">
                                        <small class=""><?php $rute = explode(',', $dpu['rute']) ?>
                                            <?php for ($i = 0; $i < count($rute); $i++) : ?>
                                                <?= $rute[$i] ?>
                                                <?php if ($i != count($rute) - 1) : ?>
                                                    <i class="fa-solid fa-circle-chevron-right"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </small>
                                    </div>
                                    <hr>
                                    <p class="text-decoration-underline">Termasuk: </p>
                                    <div class="d-flex justify-content-between text-dongker overflow-auto">
                                        <?php if ($dpu['penerbangan'] == 'Y') : ?>
                                            <span class="me-3">
                                                <i class="fa-solid fa-plane fs-4"></i> Penerbangan
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($dpu['visa'] == 'Y') : ?>
                                            <span class="me-3">
                                                <i class="fa-solid fa-book-open fs-4"></i> Visa
                                            </span><?php endif; ?>
                                        <?php if ($dpu['trasportasi'] == 'Y') : ?>
                                            <span class="me-3">
                                                <i class="fa-solid fa-car fs-4"></i> Transportasi
                                            </span><?php endif; ?>
                                        <?php if ($dpu['hotel'] == 'Y') : ?>
                                            <span class="me-3">
                                                <i class="fa-solid fa-hotel fs-4"></i> Hotel
                                            </span><?php endif; ?>
                                    </div>
                                    <hr>
                                    <p class="text-decoration-underline">Catatan: </p>
                                    <div class="row px-3">
                                        <table>
                                            <tr>
                                                <td>Maskapai</td>
                                                <td>:</td>
                                                <th><?= $dpu['maskapai'] ?></th>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Berangkat</td>
                                                <td>:</td>
                                                <th><?= date('d-m-Y',) ?></th>
                                            </tr>
                                        </table>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <p class="text-decoration-underline">Jarak: </p>
                                            <table>
                                                <tr>
                                                    <th>
                                                        <span><img class="icon-ma makkah mb-1" src="<?= base_url() ?>/public/asset/img/makkah.png" alt=""> <b>Makkah</b>
                                                    </th>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $dpu['j_makkah'] ?> m
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <span><img class="icon-ma madinah mb-2" src="<?= base_url() ?>/public/asset/img/madinah.png" alt=""> <b>Madinah</b>
                                                    </th>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $dpu['j_madinah'] ?> m</span>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div>

                                            </div>
                                            <div>

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3 mb-md-0">
                                            <p class="text-decoration-underline">Total Jamaah: </p>
                                            <div>
                                                <span><i class="fa-solid fa-user"></i> <?= $dpu['peziarah'] ?> Orang </span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="">
                                            <a href="<?= base_url() ?>/umrah/<?= $dpu['kd_pu'] ?>" class="btn btn-dongker rounded-5 border-0 py-2 px-3">Booking Sekarang <i class="fa-solid fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 bg-sea rounded-top rounded-5 text-white text-center">
                                    <div class="mb-3">
                                        <span class="fs-3">Harga</span>
                                    </div>
                                    <hr>
                                    <div class="row mx-0 px-0">
                                        <div class="col-lg-4">
                                            <p class="fst-italic">Double</p>
                                            <p>
                                                <b>Rp. <?= number_format((int)$dpu['harga_double'], 2, ',', '.') ?></b>
                                            </p>
                                        </div>
                                        <div class="col-lg-4">
                                            <p class="fst-italic">Triple</p>
                                            <p>
                                                <b>Rp. <?= number_format((int)$dpu['harga_triple'], 2, ',', '.') ?></b>
                                            </p>
                                        </div>
                                        <div class="col-lg-4">
                                            <p class="fst-italic">Quad</p>
                                            <p>
                                                <b>Rp. <?= number_format((int)$dpu['harga_quad'], 2, ',', '.') ?></b>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
<?= $this->endSection(); ?>