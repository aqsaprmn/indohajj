<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->has('umrah')) : ?>
    <div id="M_UmrahDetail">
        <?= session()->get('umrahdetail') ?>
    </div>
<?php endif; ?>

<div class="px-md-5 py-4 fs-7">
    <div class="px-md-5 pt-4 mx-md-5 mx-3 my-5">
        <div class="mb-4">
            <a href="<?= base_url() ?>/umrah" class="text-secondary text-decoration-none"><i class="fa-solid fa-chevron-left me-1"></i> Kembali mencari paket</a>
        </div>
        <div class="mb-4">
            <h5>Rencana Perjalanan Paket Umrah</h5>
        </div>
        <div>
            <div class="row mx-0 px-0">
                <div class="col-12 px-0">
                    <div class="row mb-2 mx-0 px-0 align-items-center">
                        <div class="col-md-6 mb-md-0 mb-2 px-0">
                            <span class="text-dongker fs-3"><?= $ddu['nama'] ?></span>
                        </div>
                        <div class="text-bg-sea col-md-6 rounded-5 p-md-2 px-3 text-center py-2">
                            <span class=""><i class="fa-solid fa-key me-1"></i> <?= $ddu['sub_nama'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 px-0">
                    <span class="text-secondary fs-5 fst-italic"><?= $ddu['tipe'] ?></span>
                </div>

                <hr class="mt-3">
            </div>
            <div class="row px-0 mx-0">
                <div class="col-lg-7 px-0 mx-0">
                    <div>
                        <p class="text-dongker">Transportasi</p>
                        <div style="width: 180px;" class="form-check text-bg-sea rounded-5 px-4 py-2 d-flex justify-content-center">
                            <input class="form-check-input me-1" type="radio" name="bus" id="bus1" value="option1" checked>
                            <label class="form-check-label" for="bus1">
                                Basma - Bus
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <p class="text-dongker">Hotel</p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Makkah</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Madinah</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active pt-4" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div style="width: max-content;" class="form-check text-bg-sea rounded-5 px-5 py-2">
                                    <input class="form-check-input me-1" type="radio" name="makkah" id="makkah1" value="option1" checked>
                                    <label class="form-check-label" for="makkah1">
                                        Bessan Silver Hotel <i class="fa-solid fa-bed"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="tab-pane fade pt-4" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <div style="width: max-content;" class="form-check text-bg-sea rounded-5 px-5 py-2">
                                    <input class="form-check-input me-1" type="radio" name="madinah" id="madinah1" value="option1" checked>
                                    <label class="form-check-label" for="madinah1">
                                        Saroor Taiba Hotel <i class="fa-solid fa-bed"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p class="text-dongker">Catatan</p>
                    <div>
                        <p class="text-secondary fst-italic">Harga paket sudah termasuk:</p>
                        <ul class="">
                            <?php $note = explode(',', $ddu['catatan']); ?>
                            <?php foreach ($note as $nt) : ?>
                                <li><?= $nt ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 px-0">
                    <div class="border border-1 rounded-4 p-3">
                        <div class="text-center mb-3 fs-5">
                            <span class="text-orange"><?= $ddu['remaining'] ?></span> Paket Tersisa
                        </div>
                        <div class="mb-3">
                            <span class="text-secondary">Waktu Perjalanan</span>
                            <div class="text-center rounded-5 border border-1 py-2">
                                <?= date('d/m/Y', strtotime($ddu['tgl_berangkat'])) ?> - <?= date('d/m/Y', strtotime($ddu['tgl_pulang'])) ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="text-secondary">Total Jamaah</span>
                            <div class="text-center rounded-5 border border-1 py-2">
                                <?= $ddu['peziarah'] ?> Orang
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="text-secondary">Rute:</span>
                            <div class="mt-2">
                                <span class=""><?php $rute = explode(',', $ddu['rute'])    ?>
                                    <?php for ($i = 0; $i < count($rute); $i++) : ?>
                                        <?= $rute[$i] ?>
                                        <?php if ($i != count($rute) - 1) : ?>
                                            <i class=" fa-solid fa-circle-chevron-right text-sea"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="text-secondary">Termasuk:</span>
                            <div class="d-flex justify-content-between text-dongker mt-2 overflow-x-auto">
                                <?php if ($ddu['penerbangan'] == 'Y') : ?>
                                    <span class="me-3">
                                        Penerbangan <i class="fa-solid fa-plane fs-5"></i>
                                    </span>
                                <?php endif; ?>
                                <?php if ($ddu['visa'] == 'Y') : ?>
                                    <span class="me-3">Visa
                                        <i class="fa-solid fa-book-open fs-5"></i>
                                    </span><?php endif; ?>
                                <?php if ($ddu['trasportasi'] == 'Y') : ?>
                                    <span class="me-3">Transportasi
                                        <i class="fa-solid fa-car fs-5"></i>
                                    </span><?php endif; ?>
                                <?php if ($ddu['hotel'] == 'Y') : ?>
                                    <span class="me-3">
                                        Hotel
                                        <i class="fa-solid fa-hotel fs-5"></i>
                                    </span><?php endif; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <span class="text-secondary">PDF:</span>
                            <div class="fs-1">
                                <a href="" class="text-dongker"><i class="fa-solid fa-file-pdf"></i></a>
                            </div>
                        </div>
                        <hr>
                        <form action="<?= base_url() ?>/umrah/pligrim" method="POST">
                            <?= csrf_field(); ?>
                            <input name="kd_pu" type="text" hidden value="<?= $ddu['kd_pu'] ?>">
                            <div id="jamaah" class="mb-3">
                                <span class="text-secondary">Harga:</span>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        Total Paket
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button id="btn-min" class="btn btn-outline-secondary rounded-5" type="button"><i class="fa-solid fa-minus"></i></button>
                                        <input style="width: 40px;" id="total" type="text" class="mx-3 text-center bg-transparent border-0" value="1" name="totalpaket" data-max="<?= $ddu['remaining'] ?>">
                                        <button type="button" id="btn-plus" class="btn btn-outline-secondary rounded-5"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="">Jamaah</span>
                                    </div>
                                    <div class="text-dongker fs-5">
                                        <span id="total-jamaah" data-jamaah="<?= $ddu['peziarah'] ?>"><?= $ddu['peziarah'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="">
                                <button class="form-control btn btn-orange rounded-5" type="submit">Reservasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
<?= $this->endSection(); ?>