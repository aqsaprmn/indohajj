<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div id="message" class="d-none">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="pt-80 px-5 py-4">
    <div class="mx-2 mb-4 d-flex justify-content-between">
        <div>
            <h3>Bukti Booking
            </h3>
            <span>Paket Umrah - <?= $data['book']->kd_booking ?></span>
        </div>
        <div><a class="p-0" href="<?= base_url() ?>"><img style="width: 120px;" class="" src="<?= base_url() ?>/public/asset/img/logoindohajj.png" alt=""></a></div>
    </div>
    <div class="row m-0 py-2">
        <div class="col-lg-6">
        </div>
        <div class="col-lg-6 text-end">
            <span class="text-secondary me-4">Download Berkas</span>
            <a href="" class="btn btn-danger me -1"><i class="fa-solid fa-file-pdf"></i> PDF</a>
            <a href="" class="btn btn-success ms-1"><i class="fa-solid fa-file-csv"></i> CSV</a>
        </div>
    </div>
    <div class="row m-0 mx-2 border border-dark">
        <div class="col-lg-6 p-4">
            <h5 class="mb-4">Informasi Paket Umrah</h5>
            <table>
                <tr>
                    <th>
                        Nama Paket
                    </th>
                    <td>
                        :
                    </td>
                    <td><?= $data['pu']->nama ?></td>
                </tr>
                <tr>
                    <th>
                        Deskripsi
                    </th>
                    <td>
                        :
                    </td>
                    <td><?= $data['pu']->sub_nama ?></td>
                </tr>
                <tr>
                    <th>
                        Maskapai
                    </th>
                    <td>
                        :
                    </td>
                    <td><?= $data['pu']->maskapai ?></td>
                </tr>
                <tr>
                    <th>
                        Tanggal Berangkat
                    </th>
                    <td>
                        :
                    </td>
                    <td><?= date('d-m-Y', strtotime($data['pu']->tgl_berangkat)) ?></td>
                </tr>
                <tr>
                    <th>
                        Harga
                    </th>
                    <td>
                        :
                    </td>
                    <td>Rp. <?= number_format($data['pu']->harga, 2, ',', '.') ?></td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 p-4">
            <h5 class="mb-4">Informasi Data Pembooking</h5>
            <table>
                <tr>
                    <th>
                        Kode Booking
                    </th>
                    <td>
                        :
                    </td>
                    <td><?= $data['book']->kd_booking ?></td>
                </tr>
                <tr>
                    <th>
                        Nama
                    </th>
                    <td>
                        :
                    </td>
                    <td><?= $data['book']->nama ?></td>
                </tr>
                <tr>
                    <th>
                        No Passport
                    </th>
                    <td>
                        :
                    </td>
                    <td><?= $data['book']->no_passport ?></td>
                </tr>

                <tr>
                    <th>
                        Jenis Kelamin
                    </th>
                    <td>
                        :
                    </td>
                    <td><?= ($data['book']->sex == 'L') ? 'Laki-laki' : 'Perempuan'; ?></td>
                </tr>
                <tr>
                    <th>
                        Tempat/Tanggal Lahir
                    </th>
                    <td>
                        :
                    </td>
                    <td><?= $data['book']->pob ?> / <?= date('d-m-Y', strtotime($data['book']->dob)) ?></td>
                </tr>
                <tr>
                    <th>
                        No Telpon
                    </th>
                    <td>
                        :
                    </td>
                    <td><?= $data['book']->telpon ?></td>
                </tr>
                <tr>
                    <th>
                        Email
                    </th>
                    <td>
                        :
                    </td>
                    <td><?= $data['book']->email ?></td>
                </tr>
                <tr>
                    <th>
                        Kewarganegaraan
                    </th>
                    <td>
                        :
                    </td>
                    <td><?= $data['book']->kewarganegaraan ?></td>
                </tr>
                <tr>
                    <th>
                        Passport
                    </th>
                    <td>
                        :
                    </td>
                    <td><img style="width: 200px;" src="<?= base_url('public/upload/pass') . '/' . $data['book']->image_passport ?>" alt=""></td>
                </tr>
            </table>
        </div>

    </div>

</div>
<?= $this->endSection(); ?>