<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<div class="px-3 py-4">
    <div class="px-2 mb-3">
        <h3><span class="text-b-brown">Pemesanan</span> <span class="text-b-blue">Tiket Pesawat</span></h3>
    </div>
    <div class="px-2">
        <form class="" action="" method="post">
            <div class="p-3 rounded shadow-lg mb-3">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="asal" class="form-label">Asal</label>
                        <div class="input-group">
                            <label class="input-group-text" for="asal"><i class="fa-solid fa-plane-departure"></i></label>
                            <select class="form-select" id="asal">
                                <option selected>Pilih</option>
                                <option value="1">Jakarta, Soekarno Hatta Inti Airport</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="asal" class="form-label">Berangkat</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days"></i></span>
                            <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" placeholder="Berangkat" aria-label="Berangkat">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="asal" class="form-label">Penumpang</label>
                        <div class="input-group mb-1">
                            <span class="input-group-text" style="width: 80px;" id="basic-addon1">Dewasa</span>
                            <input type="number" value="1" class="form-control" placeholder="" aria-label="Penumpang">
                        </div>
                        <div class="input-group mb-1">
                            <span class="input-group-text" style="width: 80px;" id="basic-addon1">Anak</span>
                            <input type="number" value="0" class="form-control" placeholder="" aria-label="Penumpang">
                        </div>
                        <div class="input-group">
                            <span class="input-group-text" style="width: 80px;" id="basic-addon1">Bayi</span>
                            <input type="number" value="0" class="form-control" placeholder="" aria-label="Penumpang">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="asal" class="form-label">Tujuan</label>
                        <div class="input-group">
                            <label class="input-group-text" for="tujuan"><i class="fa-solid fa-map-pin"></i></label>
                            <select class="form-select" id="tujuan">
                                <option selected>Pilih</option>
                                <option value="1">Jeddah, Bandara Internasional King Abdulaziz</option>
                                <option value="1">Madinah, Bandara Internasional Prince Mohammad bin Abdulaziz</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="pulangpergi">
                            <label class="form-check-label" for="pulangpergi">
                                Pulang Pergi
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <b>Keterangan:</b>
                        <table>
                            <tr>
                                <td>Dewasa</td>
                                <td>:</td>
                                <td>Penumpang lebih dari 12 tahun saat keberangkatan.</td>
                            </tr>
                            <tr>
                                <td>Anak</td>
                                <td>:</td>
                                <td>Penumpang antara 2 - 12 tahun saat keberangkatan.</td>
                            </tr>
                            <tr>
                                <td>Bayi</td>
                                <td>:</td>
                                <td>Penumpang < 2 tahun saat keberangkatan.</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="rounded shadow-lg p-3 mb-3">
                <div class="row">
                    <div class="col-md-6"><label for="asal" class="form-label">Maskapai</label>
                        <div class="input-group">
                            <label class="input-group-text" for="asal"><i class="fa-solid fa-plane-departure"></i></label>
                            <select class="form-select" id="maskapai">
                                <option selected>Pilih</option>
                                <option value="1">Air Asia</option>
                                <option value="2">Lion Air</option>
                                <option value="3">Sriwijaya H2H</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <img class="lionair d-none" width="400" src="<?= base_url() ?>asset/img/lionair.png" alt="">
                        <img class="aisasia d-none" width="400" src="<?= base_url() ?>asset/img/airasia.png" alt="">
                        <img class="garuda d-none" width="400" src="<?= base_url() ?>asset/img/garuda.png" alt="">
                    </div>
                </div>

            </div>
            <div class="rounded shadow-lg p-3">
                <div class="row">
                    <span class="mb-3"><b class="fs-5">Air Asia</b> | <?= date('d-m-Y') ?></span>
                    <div class="px-2">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th class="text-center">No</th>
                                <th>Kode Maskapai</th>
                                <th>Waktu</th>
                                <th class="text-center">Mata Uang</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>AA 272</td>
                                <td>06.15 - 09.05</td>
                                <td class="text-center">IDR</td>
                                <td class="text-center">500.000</td>
                                <td class="text-center"><button type="button" class="btn-brown text-white rounded border-0 p-2" data-bs-toggle="modal" data-bs-target="#bookingtiket">Booking</button></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>AA 260</td>
                                <td>17.20 - 20.10</td>
                                <td class="text-center">IDR</td>
                                <td class="text-center">600.000</td>
                                <td class="text-center"><button type="button" class="btn-brown text-white rounded border-0 p-2" data-bs-toggle="modal" data-bs-target="#bookingtiket">Booking</button></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>AA 224</td>
                                <td>18.15 - 20.55</td>
                                <td class="text-center">IDR</td>
                                <td class="text-center">550.000</td>
                                <td class="text-center"><button type="button" class="btn-brown text-white rounded border-0 p-2" data-bs-toggle="modal" data-bs-target="#bookingtiket">Booking</button></td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>AA 254</td>
                                <td>12.30 - 13.25</td>
                                <td class="text-center">IDR</td>
                                <td class="text-center">580.000</td>
                                <td class="text-center"><button type="button" class="btn-brown text-white rounded border-0 p-2" data-bs-toggle="modal" data-bs-target="#bookingtiket">Booking</button></td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>AA 222</td>
                                <td>07.40 - 08.35</td>
                                <td class="text-center">IDR</td>
                                <td class="text-center">500.000</td>
                                <td class="text-center"><button type="button" class="btn-brown text-white rounded border-0 p-2" data-bs-toggle="modal" data-bs-target="#bookingtiket">Booking</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="bookingtiket" tabindex="-1" aria-labelledby="bookingtiketLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bookingtiketLabel">Booking Tiket Pesawat - Air Asia</h5>
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
                                <button type="button" id="btnBooking" data-text="Tiket Pesawat - Air Asia" class="rounded border-0 py-2 px-2 btn-brown text-white">Booking Tiket</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>
<?= $this->endSection(); ?>