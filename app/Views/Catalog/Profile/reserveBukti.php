<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Reservasi <?= $kd_booking; ?></title>

    <link rel="stylesheet" href="<?= base_url() ?>/vendor/twbs/bootstrap/dist/css/bootstrap.css">
</head>
<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap'); */

    .pdf {
        font-family: 'Poppins', sans-serif;
    }

    .text-gray {
        color: rgb(167, 168, 167);
    }

    .text-success-white {
        color: #10a25e;
    }

    .border-success-white {
        border: 1px solid #10a25e;
    }

    .bg-success-white {
        background-color: #edfff7;
    }

    /* table:/ */

    .tableservice tr:first-child th:first-child {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .tableservice tr:first-child th:last-child {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .tableservice tr:not(:first-child):not(:nth-child(n + 3)) {
        border-bottom: 1px solid gainsboro;
    }

    .tableservice tr th {
        background-color: #F9F2E9;
        /* text-align: start; */
    }

    .tableservice tr th,
    .tableservice tr td {
        padding: 12px 0 12px 20px;
        white-space: nowrap;
    }
</style>

<body>
    <div class="pdf">
        <div class="row mx-0 px-0">
            <div class="col-6 px-0">
                <div class="position-relative">
                    <img width="120" src="<?= base_url() ?>/public/asset/img/logoindohajj.png" alt="">
                </div>
                <div class="text-gray py-2">
                    Alamat
                </div>
                <div>
                    Menara MTH, Tebet
                </div>
                <div>
                    Jakarta, Indonesia
                </div>
            </div>
            <div class="col-6 px-0 d-flex">
                <table class="w-60 ms-auto">
                    <tr>
                        <td class="text-gray">No. Faktur</td>
                        <td>:</td>
                        <td><?= $payment_ref_merchant; ?></td>
                    </tr>
                    <tr>
                        <td class="text-gray">Kode Transaksi</td>
                        <td>:</td>
                        <td><?= $payment_ref_id; ?></td>
                    </tr>
                    <tr>
                        <td class="text-gray">Kode Reservasi</td>
                        <td>:</td>
                        <td><?= $kd_booking; ?></td>
                    </tr>
                    <tr>
                        <td class="text-gray">Email</td>
                        <td>:</td>
                        <td>info@indohajj.com</td>
                    </tr>
                    <tr>
                        <td class="text-gray">Telepon</td>
                        <td>:</td>
                        <td>081212129751</td>
                    </tr>
                    <tr>
                        <td class="text-gray">Web</td>
                        <td>:</td>
                        <td><a href="http://indohajj.com/indohajj">www.indohajj.com/indohajj</a></td>
                    </tr>
                </table>
            </div>
        </div>
        <hr class="my-3">
        <div class="row px-0 mx-0 mb-5">
            <div class="col-6 px-0">
                <div>
                    <h3>Bukti Pelunasan Reservasi</h3>
                </div>
                <div class="text-gray mb-2">
                    <?php if ($tipe == "umrah") : ?>
                        Paket Umrah
                    <?php endif; ?>
                </div>
                <div class="text-success-white bg-success-white border-success-white rounded-2 w-20 py-1 text-center">
                    Lunas
                </div>
            </div>
            <div class="col-6 px-0">
                <div class="row px-0 mx-0">
                    <div class="col-6"><span class="text-gray">Tgl Reservasi:</span> <?= date('d-M-Y H:i:s', strtotime($created_at)) ?></div>
                    <div class="col-6"><span class="text-gray">Tgl Pembayaran:</span> <?= date('d-M-Y H:i:s', strtotime($paid_date)) ?></div>
                </div>
            </div>
        </div>
        <div class="row px-0 mx-0 py-5">
            <div class="col-6 px-0">
                <div class="mb-4">
                    <p><strong>From</strong></p>
                </div>
                <div class="ps-5">
                    <div class="mb-2">
                        <h5 class="mb-0"><?= $nama_reserve ?></h5>
                    </div>
                    <div class="mb-2">
                        <?= $address; ?>
                    </div>
                    <div class="mb-2">
                        <?= ($email != "") ? $email : ""; ?>
                    </div>
                    <div>
                        <?= ($hp != "") ? $hp : ""; ?>
                    </div>
                </div>
            </div>
            <div class="col-6 px-0">
                <div class="mb-4">
                    <p><strong>Pembayaran ke</strong></p>
                </div>
                <div class="ps-4">
                    <div class="mb-2">
                        <h5 class="mb-0">Indohajj</h5>
                    </div>
                    <div class="mb-2">
                        Menara MTH, Tebet, Jakarta, Indonesia
                    </div>
                    <div class="mb-2">
                        info@indohajj.com
                    </div>
                    <div>
                        081212129751
                    </div>
                </div>
            </div>
        </div>
        <table class="tableservice w-100">
            <tr>
                <th>
                    Layanan
                </th>
                <th>
                    Keterangan
                </th>
                <th class="text-center">
                    Kuantiti
                </th>
                <th></th>
                <th class="text-center">
                    Reservasi
                </th>
            </tr>
            <tr>
                <td>
                    <?php if ($tipe == "umrah") : ?>
                        Paket Umrah
                    <?php endif; ?>
                </td>
                <td>
                    <?= $nama ?>
                </td>
                <td class="text-center">
                    <?= $total_paket; ?>
                </td>
                <td></td>
                <td class="text-center">
                    Rp. <?= number_format($amount, 0, ',', '.') ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-gray">
                    Semua pembayaran menggunakan Rupiah
                </td>
                <td class="text-gray">
                    Subtotal
                </td>
                <td class="text-center">Rp. <?= number_format($amount, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td colspan="3" class="text-gray">
                </td>
                <td class="text-gray">
                    Total
                </td>
                <td class="text-center">Rp. <?= number_format($amount, 0, ',', '.') ?></td>
            </tr>
        </table>
    </div>
</body>

</html>