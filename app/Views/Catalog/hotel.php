<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="px-5 py-4">
    <div class="text-center">
        <h3>Hotel</h3>
    </div>
    <form class="px-5 py-3" action="" method="post">
        <div class="row px-2">
            <div class="col-md-2 px-1">
                <label for="namahotel" class="form-label">Nama Hotel</label>
                <input type="text" class="form-control" id="namahotel" placeholder="">
            </div>
            <div class="col-md-2 px-1">
                <label for="daerah" class="form-label">Pilih Daerah</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Daerah</option>
                    <option value="1">Abdullah Khayyat Street</option>
                    <option value="2">Abraj Al Bait</option>
                    <option value="3">Ajyad Al Masafi</option>
                    <option value="3">Ajyad Royad</option>
                    <option value="3">Al Ghaza</option>
                </select>
            </div>
            <div class="col-md-3 px-1 py-0 d-flex">
                <div class="row p-0 m-0">
                    <div class="pe-md-1 col-md-6 ps-0">
                        <label for="namahotel" class="form-label">Check In</label>
                        <input type="date" class="form-control" id="namahotel" placeholder="">
                    </div>
                    <div class="ps-md-1 col-md-6 pe-0">
                        <label for="namahotel" class="form-label">Check Out</label>
                        <input type="date" class="form-control" id="namahotel" placeholder="">
                    </div>
                </div>
            </div>
            <div class="col-md-2 px-1">
                <label for="tipe" class="form-label">Tipe Ruangan</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Double</option>
                    <option value="1">Triplet</option>
                    <option value="2">Quadruple</option>
                    <option value="3">Quintuple</option>
                    <option value="4">Sextuple</option>
                </select>
            </div>
            <div class="col-md-2 px-1">
                <label for="pemandangan" class="form-label">Pemandangan</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Tanpa Pemandangan</option>
                    <option value="1">Kaaba</option>
                    <option value="2">Haram</option>
                    <option value="3">Kota</option>
                    <option value="4">Rowdah</option>
                </select>
            </div>
            <div class="col-md-1">
                <button style="margin-top: 30px;" type="submit" class="form-control btn-brown text-white" id="submit"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
            </div>
        </div>
    </form>
    <div class="hotels">
        <div class="px-4 mb-3">
            <h3 class="px-4"><span class="text-b-brown">4</span> <span class="text-b-blue">Hotel Ditemukan</span></h3>
        </div>
        <div class="row mx-4">
            <div class="col-md-6 px-4 d-flex justify-content-center">
                <div class="card position-relative mb-3" style="width: 100%;height:340px">
                    <div class="row g-0 h-100">
                        <div class="col-md-4 h-100">
                            <img style="width: 400px;" src="<?= base_url() ?>/public/asset/img/hilton.jpeg" class="img-fluid rounded-start h-100" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Hilton Makkah Conventional Hotel</h5>
                                <hr>
                                <button class="border-0 bg-transparent text-primary px-0 mb-3" data-bs-toggle="modal" data-bs-target="#map"><i class="fa-solid fa-location-dot"></i> Lihat Di Peta</button>

                                <!-- Modal -->
                                <div class="modal fade" id="map" tabindex="-1" aria-labelledby="mapLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mapLabel">Lokasi Peta - Hilton Makkah Conventional Hotel</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3714.166459815805!2d39.81787051483911!3d21.42270118578636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c204b45652ae21%3A0x2b222b823c26269a!2sHilton%20Makkah%20Convention%20Hotel!5e0!3m2!1sen!2sid!4v1662977121758!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Fasilitas:</b>
                                        <table>
                                            <tr>
                                                <td><i class="fa-solid fa-wifi"></i></td>
                                                <td>Wifi</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa-solid fa-utensils"></i></td>
                                                <td>Restoran</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa-solid fa-square-parking"></i></td>
                                                <td>Parkir Gratis</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa-solid fa-bell-concierge"></i></td>
                                                <td>Layanan Kamar</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><b>Jarak:</b></h6>
                                        <div>
                                            <table>
                                                <tr>
                                                    <td><img class="icon-ma makkah mb-1" src="<?= base_url() ?>/public/asset/img/makkah.png" alt=""> <b>Makkah</b></td>
                                                    <td>:</td>
                                                    <td>100 meter</td>
                                                </tr>
                                                <tr>
                                                    <td><img class="icon-ma madinah mb-2" src="<?= base_url() ?>/public/asset/img/madinah.png" alt=""> <b>Madinah</b></td>
                                                    <td>:</td>
                                                    <td>200 meter</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7 py-3">
                                        Harga Mulai: <b>Rp. 1.567.217</b>
                                    </div>
                                    <div class="col-md-5 py-3">
                                        <a href="<?= base_url() ?>hotel/" class="btn-brown text-decoration-none rounded text-white border-0 py-3 px-4">Booking!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-4 d-flex justify-content-center">
                <div class="card position-relative mb-3" style="width: 100%;height:340px">
                    <div class="row g-0 h-100">
                        <div class="col-md-4 h-100">
                            <img style="width: 400px;" src="<?= base_url() ?>/public/asset/img/swissotel.jpeg" class="img-fluid rounded-start h-100" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Swissotel Makkah Hotel</h5>
                                <hr>
                                <button class="border-0 bg-transparent text-primary px-0 mb-3" data-bs-toggle="modal" data-bs-target="#swissotel"><i class="fa-solid fa-location-dot"></i> Lihat Di Peta</button>

                                <!-- Modal -->
                                <div class="modal fade" id="swissotel" tabindex="-1" aria-labelledby="swissotelLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="swissotelLabel">Lokasi Peta - Swissotel Makkah Hotell</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14857.060082491356!2d39.8268872!3d21.4188257!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6f8181ac425e9730!2sSwissotel%20Makkah!5e0!3m2!1sen!2sid!4v1662998498092!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Fasilitas:</b>
                                        <table>
                                            <tr>
                                                <td><i class="fa-solid fa-wifi"></i></td>
                                                <td>Wifi</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa-solid fa-utensils"></i></td>
                                                <td>Restoran</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa-solid fa-square-parking"></i></td>
                                                <td>Parkir Gratis</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa-solid fa-bell-concierge"></i></td>
                                                <td>Layanan Kamar</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><b>Jarak:</b></h6>
                                        <div>
                                            <table>
                                                <tr>
                                                    <td><img class="icon-ma makkah mb-1" src="<?= base_url() ?>/public/asset/img/makkah.png" alt=""> <b>Makkah</b></td>
                                                    <td>:</td>
                                                    <td>100 meter</td>
                                                </tr>
                                                <tr>
                                                    <td><img class="icon-ma madinah mb-2" src="<?= base_url() ?>/public/asset/img/madinah.png" alt=""> <b>Madinah</b></td>
                                                    <td>:</td>
                                                    <td>200 meter</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7 py-3">
                                        Harga Mulai: <b>Rp. 2.444.655</b>
                                    </div>
                                    <div class="col-md-5 py-3">
                                        <a href="<?= base_url() ?>hotel/" class="btn-brown text-decoration-none rounded text-white border-0 py-3 px-4">Booking!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-4">
            <div class="col-md-6 px-4 d-flex justify-content-center">
                <div class="card position-relative mb-3" style="width: 100%;height:340px">
                    <div class="row g-0 h-100">
                        <div class="col-md-4 h-100">
                            <img style="width: 400px;" src="<?= base_url() ?>/public/asset/img/alkiswah.jpeg" class="img-fluid rounded-start h-100" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Al Kiswah Tower Hotel</h5>
                                <hr>
                                <button class="border-0 bg-transparent text-primary px-0 mb-3" data-bs-toggle="modal" data-bs-target="#alkiswah"><i class="fa-solid fa-location-dot"></i> Lihat Di Peta</button>

                                <!-- Modal -->
                                <div class="modal fade" id="alkiswah" tabindex="-1" aria-labelledby="alkiswahLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="alkiswahLabel">Lokasi Peta - Al Kiswah Tower Hotel</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14856.023263095316!2d39.8133894!3d21.4290164!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x98bbe3e12cd20e1b!2sAl%20Kiswah%20Towers%20Hotel!5e0!3m2!1sen!2sid!4v1662998635152!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Fasilitas:</b>
                                        <table>
                                            <tr>
                                                <td><i class="fa-solid fa-wifi"></i></td>
                                                <td>Wifi</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa-solid fa-utensils"></i></td>
                                                <td>Restoran</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa-solid fa-square-parking"></i></td>
                                                <td>Parkir Gratis</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa-solid fa-bell-concierge"></i></td>
                                                <td>Layanan Kamar</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><b>Jarak:</b></h6>
                                        <div>
                                            <table>
                                                <tr>
                                                    <td><img class="icon-ma makkah mb-1" src="<?= base_url() ?>/public/asset/img/makkah.png" alt=""> <b>Makkah</b></td>
                                                    <td>:</td>
                                                    <td>100 meter</td>
                                                </tr>
                                                <tr>
                                                    <td><img class="icon-ma madinah mb-2" src="<?= base_url() ?>/public/asset/img/madinah.png" alt=""> <b>Madinah</b></td>
                                                    <td>:</td>
                                                    <td>200 meter</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7 py-3">
                                        Harga Mulai: <b>Rp. 548.022</b>
                                    </div>
                                    <div class="col-md-5 py-3">
                                        <a href="<?= base_url() ?>hotel/" class="btn-brown text-decoration-none rounded text-white border-0 py-3 px-4">Booking!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-4 d-flex justify-content-center">
                <div class="card position-relative mb-3" style="width: 100%;height:340px">
                    <div class="row g-0 h-100">
                        <div class="col-md-4 h-100">
                            <img style="width: 400px;" src="<?= base_url() ?>/public/asset/img/infinity.jpeg" class="img-fluid rounded-start h-100" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Infinity Hotel Makkah</h5>
                                <hr>
                                <button class="border-0 bg-transparent text-primary px-0 mb-3" data-bs-toggle="modal" data-bs-target="#infinity"><i class="fa-solid fa-location-dot"></i> Lihat Di Peta</button>

                                <!-- Modal -->
                                <div class="modal fade" id="infinity" tabindex="-1" aria-labelledby="infinityLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="infinityLabel">Lokasi Peta - Infinity Hotel Makkah</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14857.638981650047!2d39.8277469!3d21.4131338!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf46cc5080105736c!2sInfinity%20Hotel%20Makkah!5e0!3m2!1sen!2sid!4v1662998830405!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Fasilitas:</b>
                                        <table>
                                            <tr>
                                                <td><i class="fa-solid fa-wifi"></i></td>
                                                <td>Wifi</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa-solid fa-utensils"></i></td>
                                                <td>Restoran</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa-solid fa-square-parking"></i></td>
                                                <td>Parkir Gratis</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa-solid fa-bell-concierge"></i></td>
                                                <td>Layanan Kamar</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h6><b>Jarak:</b></h6>
                                        <div>
                                            <table>
                                                <tr>
                                                    <td><img class="icon-ma makkah mb-1" src="<?= base_url() ?>/public/asset/img/makkah.png" alt=""> <b>Makkah</b></td>
                                                    <td>:</td>
                                                    <td>100 meter</td>
                                                </tr>
                                                <tr>
                                                    <td><img class="icon-ma madinah mb-2" src="<?= base_url() ?>/public/asset/img/madinah.png" alt=""> <b>Madinah</b></td>
                                                    <td>:</td>
                                                    <td>200 meter</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7 py-3">
                                        Harga Mulai: <b>Rp. 2.877.261</b>
                                    </div>
                                    <div class="col-md-5 py-3">
                                        <a href="<?= base_url() ?>hotel/" class="btn-brown text-decoration-none rounded text-white border-0 py-3 px-4">Booking!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>