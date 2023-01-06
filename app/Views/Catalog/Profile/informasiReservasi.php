<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="pt-80 px-md-5 px-4 py-5">
    <div class="row px-0 mx-md-5 mx-0 pt-3 mt-4">
        <h3 class="px-0">
            Informasi Reservasi
        </h3>
        <small class="text-secondary px-0">Informasi berisi hasil dari penginputan reservasi yang sudah dilakukan oleh pengguna</small>
    </div>
    <div class="row my-4 mx-md-5 mx-0 px-0 position-relative overflow-x-auto">
        <div class="col-12 px-0">
            <table id="info-reserve" class="table table-bordered table-striped table-hover pt-3 ">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th class="white-space-nowrap">Kode Booking</th>
                        <th class="white-space-nowrap">Nama Paket</th>
                        <th class="white-space-nowrap">Total Paket</th>
                        <th class="text-center white-space-nowrap">Status Pembayaran</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($reserve != null) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($reserve as $r) : ?>
                            <tr class="vertical-middle">
                                <td>
                                    <?= $no; ?>
                                </td>
                                <td>
                                    <?= $r['kd_booking'] ?>
                                </td>
                                <td class="white-space-nowrap">
                                    <?= $r['nama_paket'] ?>
                                </td>
                                <td class="text-center"><?= $r['total_paket'] ?></td>
                                <td class="text-center white-space-nowrap <?php if ($r['status_payment'] == "UNPAID") : ?>
                                        text-danger
                                    <?php elseif ($r['status_payment'] == null) : ?>
                                        text-warning
                                    <?php else : ?>
                                        text-success
                                    <?php endif; ?>">
                                    <?php if ($r['status_payment'] == "UNPAID") : ?>
                                        Belum Lunas
                                    <?php elseif ($r['status_payment'] == null) : ?>
                                        Belum Memilih Pembayaran
                                    <?php else : ?>
                                        Lunas
                                    <?php endif; ?>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <?php if ($r['status_payment'] == "UNPAID") : ?>
                                        <a href="https://tripay.co.id/checkout/<?= $r['payment_ref_id'] ?>" class="btn btn-success w-55">Pelunasan <i class="fa-solid fa-file-invoice"></i></a>
                                    <?php elseif ($r['status_payment'] == null) : ?>
                                        <a style="" href="<?= base_url() ?>/umrah/checkout/<?= $r['kd_booking'] ?>" class="btn btn-warning w-55 white-space-nowrap">Pembayaran <i class="fa-solid fa-file-invoice-dollar"></i></a>
                                    <?php else : ?>
                                        <a href="" class="btn btn-danger white-space-nowrap w-55">Bukti <i class="fa-regular fa-file-pdf ms-1 "></i></a>
                                    <?php endif; ?>
                                    <a class="btn btn-dongker ms-1 w-35 white-space-nowrap" href="<?= base_url() ?>/informasiReservasi/<?= $r['kd_booking'] ?>">Detail <i class="fa-brands fa-codepen"></i></a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(function() {
        var info_reserve = $('#info-reserve').DataTable({
            ordering: false
        });

    })
</script>
<?= $this->endSection(); ?>