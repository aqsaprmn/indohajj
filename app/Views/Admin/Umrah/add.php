<?= $this->extend('Admin/index') ?>

<?= $this->section('content') ?>

<div class="row mx-0 p-3">
    <div class="col-md-12">
        <h1>
            <?= $title ?>
        </h1>
    </div>

    <div class="col-md-12 p-3">
        <form action="<?= base_url() ?>/adminuser/paketumrah/insert" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <div class="row mx-0 p-0">
                        <div class="col-lg-6">
                            <div class="form-group <?= ($validation->hasError('nama')) ? "has-error has-feedback" : ""; ?>">
                                <label for="nama">Judul</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan judul" name="nama" value="<?= old('nama'); ?>">
                                <?php if ($validation->hasError('nama')) : ?>
                                    <small id="" class="form-text text-danger"><?= $validation->getError('nama'); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="subnama">Sub Judul</label>
                                <input type="text" class="form-control" id="subnama" placeholder="Masukkan sub judul" name="subnama" required>
                            </div>
                            <div class="form-group">
                                <label for="tipe">Tipe</label>
                                <select class="form-control" name="tipe" id="tipe">
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="rute">Rute</label>
                                <input type="text" class="form-control" id="rute" placeholder="Masukkan rute" name="rute" required>
                                <small id="" class="form-text text-muted">Setiap tempat ditambah koma (,) - (Bandara,Jeddah,Makkah).</small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mx-0 px-0">
                                <div class="col-lg-6 px-0">
                                    <div class="form-group">
                                        <label for="tgl_berangkat">Tgl Berangkat</label>
                                        <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat">
                                    </div>
                                </div>
                                <div class="col-lg-6 px-0">
                                    <div class="form-group">
                                        <label for="tgl_pulang">Tgl Pulang</label>
                                        <input type="date" class="form-control" id="tgl_pulang" name="tgl_pulang">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jamaah">Jumlah Jamaah</label>
                                <input type="number" class="form-control" id="jamaah" placeholder="Masukkan jumlah jamaah" name="jamaah" required>
                            </div>
                            <div class="form-group">
                                <label for="reservasi">Reservasi</label>
                                <input type="text" class="form-control" id="reservasi" placeholder="Masukkan reservasi" name="reservasi" required>
                                <small id="" class="form-text text-muted">Masukkan reservasi tanpa tanda baca (10000000)</small>
                            </div>
                            <div class="form-group">
                                <label for="perjalanan">Lama Perjalanan</label>
                                <input type="number" class="form-control" id="perjalanan" placeholder="Masukkan lama perjalanan" name="perjalanan" required>
                                <small id="" class="form-text text-muted">Total berdasarkan hari.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row mx-0 p-0">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="harga-double">Harga Double</label>
                                <input type="text" class="form-control" id="harga-double" placeholder="Masukkan harga double" name="hargadouble" required autocomplete="off">
                                <small id="" class="form-text text-muted">Masukkan harga tanpa tanda baca (10000000)</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="harga-triple">Harga Triple</label>
                                <input type="text" class="form-control" id="harga-triple" placeholder="Masukkan harga triple" name="hargatriple" required autocomplete="off">
                                <small id="" class="form-text text-muted">Masukkan harga tanpa tanda baca (10000000)</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="harga-quad">Harga</label>
                                <input type="text" class="form-control" id="harga-quad" placeholder="Masukkan harga quad" name="hargaquad" required autocomplete="off">
                                <small id="" class="form-text text-muted">Masukkan harga tanpa tanda baca (10000000)</small>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row mx-0 p-0">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="jMakkah">Jarak Makkah</label>
                                <input type="number" class="form-control" id="jMakkah" placeholder="Masukkan jarak makkah" name="jMakkah" required>
                                <small id="" class="form-text text-muted">Masukkan angka, tanpa ukuran seperti meter.</small>
                            </div>
                            <div class="form-group">
                                <label for="jMadinah">Jarak Madinah</label>
                                <input type="number" class="form-control" id="jMadinah" placeholder="Masukkan jarak madinah" name="jMadinah" required>
                                <small id="" class="form-text text-muted">Masukkan angka, tanpa ukuran seperti meter.</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <div class="mb-2">
                                    <span>Penerbangan</span>
                                </div>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Y" name="penerbangan">
                                    <span class="form-check-sign">Paket termasuk penerbangan</span>
                                </label>
                            </div>
                            <div id="maskapai" class="form-group d-none">
                                <label for="maskapai">Maskapai</label>
                                <select class="form-control" name="maskapai" id="maskapai">
                                    <option value="Lion Air">Lion Air</option>
                                    <option value="Garuda">Garuda</option>
                                    <option value="Batik Air">Batik Air</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <div class="mb-2">
                                    <span>Visa</span>
                                </div>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Y" name="visa">
                                    <span class="form-check-sign">Paket termasuk visa</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <div class="mb-2">
                                    <span>Hotel</span>
                                </div>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Y" name="hotel">
                                    <span class="form-check-sign">Paket termasuk hotel</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <div class="mb-2">
                                    <span>Transportasi</span>
                                </div>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Y" name="trasportasi">
                                    <span class="form-check-sign">Paket termasuk transportasi</span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mx-0 p-0">
                <div class="col-lg-6 px-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="catatan">Catatan*</label>
                                <textarea class="form-control" id="catatan" rows="5" name="catatan"></textarea>
                                <small id="" class="form-text text-muted">Setiap catatan ditambah koma (,) - (Tiket pesawat PP,Bagasi 1 pcs @30kg)</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mx-0 px-0">
                                <div class="form-group">
                                    <label for="image">Gambar Paket</label>
                                    <input type="file" class="form-control-file rounded p-2 bg-dark" id="image" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-2">
                                    <span class="text-white"><b>Action</b></span>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a class="btn btn-dark form-control" href="<?= base_url() ?>/adminuser/paketumrah">Batal</a>
                                    </div>
                                    <div class="col-lg-4">
                                        <button class="btn btn-primary form-control" type="submit">Tambah</button>
                                    </div>
                                    <div class="col-lg-4">
                                        <button class="btn btn-info form-control">Draft</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('[name=penerbangan]').on('change', function() {
            if (this.checked) {
                $('#maskapai').removeClass('d-none');
            } else {
                $('#maskapai').addClass('d-none');
            }
        });
    });
</script>
<?= $this->endSection() ?>