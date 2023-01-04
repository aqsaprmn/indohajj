<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="px-5 py-4 fs-7">
    <div class="my-3">
        <div class="mb-4">
            <h5>Status Reservasi</h5>
        </div>
        <div class="mb-3 row mx-0 px-0">
            <div class="col-lg-8">
                <div class="mb-3">
                    <div>
                        <span class="text-dongker">Informasi Reservasi</span>
                    </div>
                    <div class="row mt-1 mx-0 rounded-1 border border-1 p-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <span class="text-secondary">Nama Pemesan:</span>
                                <div class="border border-1 p-2 rounded-1">
                                    <?= $ud['name'] ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <span class="text-secondary">Nama Paket:</span>
                                <div class="border border-1 p-2 rounded-1">
                                    <?= $pp['nama'] ?>
                                </div>
                            </div>

                            <div class="">
                                <span class="text-secondary">Total Pesanan Paket:</span>
                                <div class="border border-1 p-2 rounded-1">
                                    <?= $pb['total_paket'] ?>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <span class="text-secondary">Kode Reservasi:</span>
                                <div class="border border-1 p-2 rounded-1">
                                    <?= $pb['kd_booking'] ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <span class="text-secondary">Tanggal Pemesanan:</span>
                                <div class="border border-1 p-2 rounded-1"><?= date('D, d-F-Y', strtotime($pb['created_at'])) ?>
                                </div>
                            </div>
                            <div class="">
                                <span class="text-secondary">Total Jamaah:</span>
                                <div class="border border-1 p-2 rounded-1">
                                    <?= $pb['total_jamaah'] ?> Orang
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <div>
                        <span class="text-dongker">Informasi Status Pembayaran</span>
                    </div>
                    <div class="row mt-1 mx-0 rounded-1 border border-1 p-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-secondary">Total Dibayarkan:</span>
                            <span class="fs-4 text-dongker">
                                Rp. 10.000.000,00
                            </span>
                        </div>
                        <div class="">
                            <span>Status:</span>
                            <div class="row mt-1 mx-0 rounded-1 border border-1 p-2 text-center mb-3">
                                <?php if ($pb['status'] == "N") : ?>
                                    <span class="text-danger">Belum Upluad Bukti Pembayaran</span>
                                <?php elseif ($pb['status'] == "U") : ?>
                                    <span class="text-warning">Menunggu Konfirmasi</span>
                                <?php else : ?>
                                    <span class="text-success">Sudah dikonfirmasi</span>
                                <?php endif; ?>
                            </div>
                            <div class="row mx-0 px-0">
                                <?php if ($pb['status'] == "N") : ?>
                                    <button class="btn btn-purple">Unggah Bukti Pembayaran</button>
                                <?php elseif ($pb['status'] == "U") : ?>
                                    <a href="<?= base_url() ?>" class="btn btn-sea">Kembali ke Menu Utama</a>
                                <?php else : ?>
                                    <a href="<?= base_url() ?>" class="btn btn-success" download>Download Bukti Konfirmasi</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
<?= $this->endSection(); ?>