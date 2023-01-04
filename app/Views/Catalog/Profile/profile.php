<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="pt-80 px-5 py-4">
    <div class="row mx-0">
        <h3>
            Profil Saya
        </h3>
        <small class="text-secondary">Profil dengan data input pada saat pendaftaran</small>
    </div>

    <div style="font-size: 0.9rem;" class="row mt-4 mx-0">
        <div>
            <b>Foto profil</b>
            <div class="row mt-4 mx-0">
                <div class="col-lg-2">
                    <img src="<?= base_url() ?>/public/asset/profil/<?= $profile['image'] ?>" alt="" class="profil-img">
                </div>
                <div class="col-lg-4">
                    <!-- <div>
                        <div class="row mx-0">
                            <button class="btn btn-purple rounded-1"><small>Ganti foto</small></button>
                            <input type="file" class="custom-file-input" id="change-poto" hidden>
                        </div>
                        <div class="row mx-0 mt-1">
                            <button class="btn btn-outline-secondary rounded-1"><small>Hapus foto <i class="fa-regular fa-trash-can text-danger ms-1"></i></small></button>
                            <input type="file" id="remove-poto" hidden class="custom-file-input">
                        </div>
                    </div> -->
                    <table class="mt-3">
                        <tr>
                            <th class="text-secondary">
                                <small>Kode Referral</small>
                            </th>
                            <th class="px-2 py-1">
                                :
                            </th>
                            <td class="px-2 py-1">
                                <input id="textCopy" type="text" value="<?= $profile['kd_referral'] ?>" disabled class=" border-0 bg-transparent text-dark">
                            </td>
                            <td class="px-4 position-relative text-center">
                                <div class="tooltip-copy">
                                    <button class="btn btn-outline-secondary" id="btnCopy"><i class="fa-regular fa-copy btn-copy"></i>
                                    </button>
                                    <span class=" tooltiptext-copy" id="tooltiptext"> Copied</span>
                                </div>

                            </td>
                        </tr>
                        <th class="text-secondary">
                            <small>Sumber Referral</small>
                        </th>
                        <th class="px-2 py-1">
                            :
                        </th>
                        <td class="px-2 py-1">
                            <?= $profile['sb_referral'] ?>
                        </td>
                        </tr>
                    </table>

                </div>
            </div>

            <div class="row mx-0 mt-4">
                <div class="col-lg-6">
                    <div class="mx-0">
                        <label for="nama" class="form-label text-secondary"><b>Nama lengkap</b></label>
                        <p class="rounded-2 border border-1 py-2 px-3" id="nama"><?= ($profile['name'] != "") ? $profile['name'] : "-"; ?></p>
                    </div>
                    <div class="mx-0">
                        <label for="nama" class="form-label text-secondary"><b>Jenis Kelamin</b></label>
                        <p class="rounded-2 border border-1 py-2 px-3" id="nama"><?= ($profile['sex'] == "L") ? "Laki-laki" : "Perempuan" ?></p>
                    </div>
                    <div class="mx-0">
                        <label for="ttl" class="form-label text-secondary"><b>Tempat/Tanggal Lahir</b></label>
                        <p class="rounded-2 border border-1 py-2 px-3" id="ttl"><?= ($profile['pob'] != "") ? $profile['pob'] : "-"; ?> ,<?= ($profile['dob'] != "") ? $profile['dob'] : "-"; ?></p>
                    </div>
                    <div class="mx-0">
                        <label for="address" class="form-label text-secondary"><b>NIK</b></label>
                        <p class="rounded-2 border border-1 py-2 px-3" id="address"><?= ($profile['nik'] != "") ? $profile['nik'] : "-"; ?></p>
                    </div>
                    <div class="mx-0">
                        <label for="address" class="form-label text-secondary"><b>Alamat</b></label>
                        <p class="rounded-2 border border-1 py-2 px-3" id="address"><?= ($profile['address'] != "") ? $profile['address'] : "-"; ?></p>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="mx-0">
                        <label for="username" class="form-label text-secondary"><b>Username</b></label>
                        <p class="rounded-2 border border-1 py-2 px-3" id="username"><?= $profile['username'] ?></p>
                    </div>
                    <div class="mx-0">
                        <label for="role" class="form-label text-secondary"><b>Peran</b></label>
                        <p class="rounded-2 border border-1 py-2 px-3" id="role"><?= ($profile['role_id'] == 'AGN') ? "Agent" : "Individual" ?></p>
                    </div>
                    <div class="mx-0">
                        <label for="email" class="form-label text-secondary"><b>Email</b></label>
                        <p class="rounded-2 border border-1 py-2 px-3" id="email"><?= ($profile['email'] != "") ? $profile['email'] : "-"; ?></p>
                    </div>
                    <div class="mx-0">
                        <label for="hp" class="form-label text-secondary"><b>No. Telpon</b></label>
                        <p class="rounded-2 border border-1 py-2 px-3" id="hp"><?= ($profile['hp'] != "") ? $profile['hp'] : "-"; ?></p>
                    </div>
                    <div class="mx-0">
                        <label for="hp" class="form-label text-secondary"><b>Tanggal Daftar</b></label>
                        <p class="rounded-2 border border-1 py-2 px-3" id="hp"><?= date('d-m-Y H:i:s', strtotime($profile['created_at'])) ?></p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<script>

</script>
<?= $this->endSection(); ?>