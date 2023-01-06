<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="px-md-5 px-3 py-4 fs-7 bg-gray-white">
    <div class="pt-4">
        <div class="mb-4">
            <h5 class="px-2">Detail Reservasi</h5>
        </div>
        <div class="mb-3 row mx-0 px-0">
            <div class="col-lg-8 mb-3">
                <div class="mb-3">
                    <div>
                        <span class="">Informasi Reservasi</span>
                    </div>
                    <div class="row mt-1 mx-0 rounded-2 bg-white shadow-sm p-3">
                        <div class="col-sm-7">
                            <span class="">Kode Reservasi:</span> - <span class="text-secondary"><?= $pb['kd_booking']; ?></span>
                        </div>
                        <div class="col-sm-5 text-sm-end">
                            <?= date('D, d-F-Y', strtotime($pb['created_at'])) ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <span class="">Informasi Jamaah</span>
                    </div>
                    <div class="rounded-2 bg-white shadow-sm p-3 position-relative overflow-x-auto">
                        <table data-kd-booking="<?= $pb['kd_booking'] ?>" id="info-jamaah" class="table table-striped table-hover table-bordered pt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="white-space-nowrap">Kode Jamaah</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th class="white-space-nowrap">No. Paspor</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <div>
                        <span class="">Informasi Pembayaran</span>
                    </div>
                    <div class="row mt-1 mx-0 rounded-2 bg-white shadow-sm p-4">
                        <div class="mb-1 p-0">Metode Pembayaran</div>
                        <div class="bg-gray rounded-2 p-2 text-center mb-3">
                            QRIS2
                        </div>
                        <hr class="mb-2">
                        <div class="position-relative overflow-x-auto p-0 mb-2">
                            <table class="w-100 table table-hover table-borderless m-0 p-0">
                                <tr class="vertical-middle">
                                    <td class="text-secondary p-1 white-space-nowrap">
                                        Transaksi Kode
                                    </td>
                                    <td class="text-end">
                                        <?= $pb['payment_ref_id'] ?>
                                    </td>
                                </tr>
                                <tr class="vertical-middle">
                                    <td class="text-secondary p-1 white-space-nowrap">
                                        No. Faktur
                                    </td>
                                    <td class="text-end">
                                        <?= $pb['payment_ref_merchant'] ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                        <div class="p-0 mb-1">
                            Ringkasan Pemesanan
                        </div>
                        <table class="mb-1">
                            <tr>
                                <td class="text-secondary">
                                    Biaya Reservasi
                                </td>
                                <td class="text-end">
                                    Rp. <?= number_format($pb['reservasi'] * $pb['total_paket'], 0, ',', '.'); ?>
                                </td>
                            </tr>
                        </table>
                        <hr class="mb-1">
                        <table class="mb-3">
                            <tr>
                                <td class="text-secondary">
                                    Total Pembayaran
                                </td>
                                <td class="text-end text-dongker">
                                    Rp. <?= number_format($pb['reservasi'] * $pb['total_paket'], 0, ',', '.'); ?>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <?php if ($pb['status'] === "PAID") : ?>
                            <div class="bg-success-white rounded-2 text-center p-2">
                                TELAH MELAKUKAN <span class="text-success">PEMBAYARAN RESERVASI</span>
                            </div>
                        <?php elseif ($pb['status'] === "UNPAID") : ?>
                            <div class="bg-danger-white rounded-2 text-center p-2">
                                PEMBAYARAN BERAKHIR PADA:
                                <span class="text-danger">
                                    <?= $pb['expired_at']; ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="bg-warning-white rounded-2 text-center p-2 mb-1">
                                BELUM MEMILIH METODE <span class="text-warning">PEMBAYARAN</span>
                            </div>

                            <a href="<?= base_url() ?>/umrah/checkout/<?= $pb['kd_booking'] ?>" class="btn btn-dongker">Pilih Metode Pembayaran</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <span class="">Informasi Paket Umrah</span>
                    </div>
                    <div class="row mt-1 mx-0 rounded-2 bg-white shadow-sm p-3">
                        <div class="mb-3">
                            <span class="text-secondary">Nama Paket</span>
                            <div class="text-center rounded-5 border border-1 py-2">
                                <?= $pb['nama_paket']; ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="text-secondary">Waktu Perjalanan</span>
                            <div class="text-center rounded-5 border border-1 py-2">
                                <?= date('d/m/Y', strtotime($pb['tgl_berangkat'])) ?> - <?= date('d/m/Y', strtotime($pb['tgl_pulang'])) ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="text-secondary">Total Jamaah</span>
                            <div class="text-center rounded-5 border border-1 py-2">
                                <?= $pb['total_jamaah']; ?> Orang
                            </div>
                        </div>
                        <div id="" class="">
                            <div class="mb-1">
                                <span class="text-secondary">Harga</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">

                                <div>
                                    <span class="text-orange mx-1"><?= $pb['total_paket'] ?>
                                    </span> Paket
                                    <span class="text-orange mx-1"><?= $pb['total_paket'] ?></span> Jamaah
                                </div>
                                <div class="text-dongker fs-5">
                                    <span id="total-harga">Rp. <?= number_format($pb['harga'], 0, ',', '.') ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        // console.log("<?= base_url() ?>/umrah/infoJamaah/" + $('#info-jamaah').data('kd-booking'));
        var table = $('#info-jamaah').DataTable({
            ordering: false,
            ajax: "<?= base_url() ?>/umrah/infoJamaah/" + $('#info-jamaah').data('kd-booking'),
            columns: [{
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                },
                {
                    data: 'kd_jamaah'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'nik'
                },
                {
                    data: 'no_paspor'
                }
            ]
        });

        $('#info-jamaah').on('page.dt', function() {
            var info = table.page.info();
            $('#pageInfo').html('Showing page: ' + info.page + ' of ' + info.pages);
        });

        // Add event listener for opening and closing details
        $('#info-jamaah tbody').on('click', 'td.dt-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });

        function format(d) {
            // `d` is the original data object for the row
            // const date = new Date();
            const sex = (d.sex == "L") ? "Laki-laki" : "Perempuan";
            const dob = d.dob.split('-');
            const newdob = dob[2] + "-" + dob[1] + "-" + dob[0];

            return (
                '<table cellpadding="1" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<td>Tipe/ Harga</td>' +
                '<td>:</td>' +
                '<td>' +
                d.tipe + "-" + d.harga +
                '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Kelamin</td>' +
                '<td>:</td>' +
                '<td>' +
                sex +
                '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Tempat Tanggal Lahir</td>' +
                '<td>:</td>' +
                '<td>' +
                d.pob + ', ' + newdob +
                '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Alamat</td>' +
                '<td>:</td>' +
                '<td>' +
                d.address +
                '</td>' +
                '</tr>' +
                '<tr>' +
                '</tr>' +
                '</table>' +
                '<div class="row m-0 p-0">' +
                '<div class="col-6 d-flex justify-content-center"><div class="rounded-2 p-2 border border-1 d-flex justify-content-center w-100"><image style="height: 200px" class="w-100" src=' + '<?= base_url() ?>/public/upload/pass/' + d.image + '></div></div>' +
                '<div class="col-6 d-flex justify-content-center"><div class="rounded-2 p-2 border border-1 d-flex justify-content-center w-100"><image style="height: 200px" class="w-100" src=' + '<?= base_url() ?>/public/upload/ktp/' + d.img_ktp + '></div></div>' +
                '</div>'
            );
        }


    });
</script>
<?= $this->endSection(); ?>