<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="px-md-5 px-3 py-4 fs-7">
    <div class="my-5 pt-4">
        <div class="mb-4">
            <h5>Pembayaran Reservasi</h5>
        </div>
        <div class="mb-3 row mx-0 px-0">
            <div class="col-lg-7 mb-3">
                <div class="mb-3">
                    <div>
                        <span class="">Informasi Reservasi</span>
                    </div>
                    <div class="row mt-1 mx-0 rounded-1 border border-1 p-3">
                        <div class="col-lg-7">
                            <span class=" text-orange"><?= $ud['name']; ?></span> - <span class="text-secondary"><?= $pb['kd_booking']; ?></span>
                        </div>
                        <div class="col-lg-5 text-end">
                            <?= date('D, d-F-Y', strtotime($pb['created_at'])) ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <span class="">Informasi Jamaah</span>
                    </div>
                    <div class="rounded-1 border border-1 p-3 position-relative overflow-x-auto">
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
                <div class="mb-3">
                    <div>
                        <span class="">Informasi Paket Umrah</span>
                    </div>
                    <div class="row mt-1 mx-0 rounded-1 border border-1 p-3">
                        <div class="mb-3">
                            <span class="text-secondary">Nama Paket</span>
                            <div class="text-center rounded-5 border border-1 py-2">
                                <?= $pp['nama']; ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="text-secondary">Waktu Perjalanan</span>
                            <div class="text-center rounded-5 border border-1 py-2">
                                <?= date('d/m/Y', strtotime($pp['tgl_berangkat'])) ?> - <?= date('d/m/Y', strtotime($pp['tgl_pulang'])) ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="text-secondary">Total Jamaah</span>
                            <div class="text-center rounded-5 border border-1 py-2">
                                <?= $pp['peziarah'] * $pb['total_paket']; ?> Orang
                            </div>
                        </div>
                        <div id="" class="">
                            <div class="mb-1">
                                <span class="text-secondary">Harga:</span>
                            </div>
                            <div class="d-flex flex-column justify-content-between mb-4">
                                <div>
                                    Total:
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">

                                <div>
                                    <span class="text-orange mx-1"><?= $pb['total_paket'] ?>
                                    </span> Paket
                                    <span class="text-orange mx-1"><?= $pb['total_paket'] ?></span> Jamaah
                                </div>
                                <div class="text-dongker fs-5">
                                    <span id="total-harga">Rp. <?= number_format($harga[0]['harga'], 0, ',', '.') ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">

                <div>
                    <div>
                        <span class="">Informasi Pembayaran</span>
                    </div>
                    <div class="row mt-1 mx-0 rounded-1 border border-1 p-3">

                        <div class="mb-3">
                            <p>Silahkan melakukan pemilihan cara pembayaran untuk melakukan pelunasan reservasi </p>
                            <small class="text-secondary">Selanjutnya akan melakukan pembayaran*</small>
                        </div>
                        <hr>
                        <form action="<?= base_url() ?>/payment/umrah" method="POST">
                            <div class="text-center row mx-0 px-0 mb-3">
                                <div class="col-12 px-1 mb-1">
                                    <div class="form-check position-relative d-flex align-items-center text-center rounded-1 active-radio px-2 border border-1">
                                        <input class="form-check-input m-1" value="ovo" type="radio" name="payment" id="ovo" required>
                                        <label class="form-check-label d-flex align-items-center border-0 form-control" for="ovo">
                                            <img style="width:72px" src="<?= base_url() ?>/public/asset/img/ovo.png" alt="">
                                            <span class="text-center m-auto">Ovo</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 px-1">
                                    <div class="form-check position-relative d-flex align-items-center text-center rounded-1 active-radio px-2 border border-1">
                                        <input class="form-check-input m-1" value="dana" type="radio" name="payment" id="dana">
                                        <label class="form-check-label d-flex align-items-center border-0 form-control" for="dana">
                                            <img style="width:72px" src="<?= base_url() ?>/public/asset/img/dana.png" alt="">
                                            <span class="text-center m-auto">Dana</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-orange">Total Reservasi</span>
                                <span class="text-dongker fs-5">Rp. <?= number_format($pp['reservasi'] * $pb['total_paket'], 2, ',', '.') ?></span>
                            </div>
                            <hr>
                            <!-- <form action="<?= base_url() ?>/umrah/payment" method="post" enctype="multipart/form-data" class="mb-2">
                            <?= csrf_field() ?>
                            <input type="text" hidden name="kdBooking" value="<?= $pb['kd_booking'] ?>">
                            <div class="mb-3">
                                <label for="payment" class="form-label text-secondary">Unggah Bukti Pembayaran*</label>
                                <input class="form-control rounded-5 p-2" type="file" id="payment" name="payment" required>
                            </div>
                            <div>
                                <button class="btn btn-sea form-control rounded-5">Submit Pembayaran</button>
                            </div>
                        </form> -->
                            <div class="">
                                <input type="text" name="kd_booking" hidden value="<?= $pb['kd_booking'] ?>">
                                <input type="text" name="harga" hidden value="<?= $pp['reservasi'] * $pb['total_paket'] ?>">
                                <button type="submit" class="btn btn-purple rounded-5 form-control">
                                    Submit Pembayaran
                                </button>

                            </div>
                        </form>
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
                '<td><div class="rounded-2 p-2 border border-dark"><image style="width: 300px; height: 200px" src=' + '<?= base_url() ?>/public/upload/pass/' + d.image + '></div></td>' +
                '<td></td>' +
                '<td><div class="rounded-2 p-2 border border-dark"><image style="width: 300px; height: 200px" src=' + '<?= base_url() ?>/public/upload/ktp/' + d.img_ktp + '></div></td>' +
                '</tr>' +
                '</table>'
            );
        }


    });
</script>
<?= $this->endSection(); ?>