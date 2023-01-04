<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div id="kdRef" class="d-none">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<script>
    const kdRef = document.getElementById('kdRef');
    if (kdRef) {
        Swal.fire({
            icon: 'error',
            title: 'Daftar Gagal',
            text: 'Kode Referral tidak terdaftar'
        })
    }
</script>
<div class="row mx-0 p-0 mb-5">
    <div id="" class="col-lg-5 d-flex flex-column regist-backdrop rounded-1 justify-content-evenly align-items-center align-items-start mb-lg-0 mb-2">
        <div class="bg-light m-5 p-3 rounded-5 mb-5">
            <a class="p-0" href="<?= base_url() ?>"><img class="nav-logo" src="<?= base_url() ?>/public/asset/img/logoindohajj.png" alt=""></a>
        </div>
        <div class="w-100">
            <ul class=" position-relative sosmed">
                <li class="sosmed-list ">
                    <a href="" class="bg-danger sos-hover text-white">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li class="sosmed-list">
                    <a href="" class="bg-primary sos-hover text-white">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </li>
                <li class="sosmed-list">
                    <a href="" class="bg-info sos-hover text-white">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </li>
                <li class="sosmed-list">
                    <a href="" class="bg-danger sos-hover text-white">
                        <i class="fa-solid fa-g"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-7 px-lg-3 pt-4 px-3 px-sm-5">
        <?php if ($role === 'agent') : ?>
            <div class="mb-5 px-2 px-lg-4">
                <h2><b>Agent</b></h3>
                    <p>Daftar sekarang untuk mendapatkan promo dan penawaran terbaik untuk pendaftaran umrah dan haji dengan harga terbaik dan terbilang cepat.</p>
                    <p class="text-secondary">Sudah punya akun? <a href="login" class=" text-decoration-none text-login-hover">Log in.</a></p>
            </div>
            <div>
                <nav class="">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-login-tab" data-bs-toggle="tab" data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login" aria-selected="true">Data Login</button>
                        <button class="nav-link" id="nav-pribadi-tab" data-bs-toggle="tab" data-bs-target="#nav-pribadi" type="button" role="tab" aria-controls="nav-pribadi" aria-selected="false">Data Pribadi</button>
                    </div>
                </nav>
                <form action="<?= base_url() ?>/user/inputRegist" method="post">
                    <?= csrf_field(); ?>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active p-3" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab" tabindex="0">
                            <div class="row mx-0">
                                <div class="col-md-12">
                                    <div class="">
                                        <input type="text" hidden value="<?= $role ?>" name="role">
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label"><b>Username*</b></label>
                                        <input type="text" placeholder="Masukkan username" class="form-control rounded-5 px-3 py-2 <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input check-telp" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-validate="<?= ($validation->hasError('hp')) ? "validhp" : "" ?>">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"><small class="text-secondary">Jika tidak punya email, Verifikasi via telepon?</small></label>
                                    </div>
                                    <div id="input-email" class="mb-3">
                                        <label for="email" class="form-label"><b>Email*</b></label>
                                        <input type="text" placeholder="Masukkan Email" class="form-control rounded-5 px-3 py-2 <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <div id="input-hp" class="mb-3" hidden>
                                        <label for="hp" class="form-label"><b>No. Telepon*</b></label>
                                        <input type="text" placeholder="Masukkan No. Telepon" class=" form-control rounded-5 px-3 py-2 <?= ($validation->hasError('hp')) ? 'is-invalid' : ''; ?>" id="hp" name="hp" value="<?= old('hp'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('hp'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label"><b>Password*</b></label>
                                        <div class="position-relative password">
                                            <input type="password" placeholder="Masukkan password" class="form-control rounded-5 px-3 py-2 pe-5 <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
                                            <a href="" class="see"><i class="fa-solid fa-eye-slash"></i></a>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="password2" class="form-label"><b>Konfirmasi Password*</b></label>
                                        <div class="position-relative password">
                                            <input type="password" placeholder="Masukkan konfirmasi password" class="form-control rounded-5 px-3 py-2 pe-5 <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="password2" name="password2">
                                            <a href="" class="see"><i class="fa-solid fa-eye-slash"></i></a>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('password2'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row px-0 mx-0">
                                        <button id="next" type="button" class="btn btn-sea rounded-5">Selanjutnya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade p-3 position-relative" id="nav-pribadi" role="tabpanel" aria-labelledby="nav-pribadi-tab" tabindex="0">
                            <div id="loader" class="loader-wrapper d-none">
                                <span class="loader"><span class="loader-inner"></span></span>
                            </div>
                            <div class="row mx-0">
                                <div class="col-md-6">
                                    <div class="mb-3 ">
                                        <label for="file" class="form-label white-space-nowrap">Isi Data Otomatis? Unggah KTP</label>
                                        <input class="form-control rounded-5 px-3 py-2" type="file" id="file" name="file">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control rounded-5 px-3 py-2" name="nama" id="nama" value="<?= old('nama'); ?>" placeholder="Masukkan nama lengkap" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                                        <input type="text" class="form-control rounded-5 px-3 py-2" name="nik" id="nik" max="20" placeholder="Masukkan Nomor Induk Kependudukan" value="<?= old('nik'); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sex" class="form-label">Jenis Kelamin</label>
                                        <div class="">
                                            <select name="sex" id="sex" class="form-select rounded-5 px-3 py-2" aria-label="Default select example">
                                                <option disabled>Pilih Jenis Kelamin</option>
                                                <option selected value="L">Laki - laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Alamat</label>
                                        <input type="text" class="form-control rounded-5 px-3 py-2" id="address" name="address" placeholder="Masukkan alamat" value="<?= old('address'); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="national" class="form-label">Kewarganegaraan</label>
                                        <input type="text" class="form-control rounded-5 px-3 py-2" id="national" name="national" placeholder="Masukkan kewarganegaraan" value="<?= old('national'); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tempat/ Tgl Lahir</label>
                                        <div class="row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control rounded-5 px-3 py-2" id="pob" name="pob" autocomplete="off" value="<?= old('pob'); ?>" placeholder="Tempat lahir" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="date" name="dob" class="form-control rounded-5 px-3 py-2" id="dob" value="<?= old('dob'); ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="padding-top:32px" class="row px-0 mx-0">
                                        <div class="col-sm-6 px-0 mb-sm-1 pe-0 pe-sm-1 mb-3">
                                            <button id="before" type="button" class="btn btn-sea form-control rounded-5">Sebelumnya</button>
                                        </div>
                                        <div class="col-sm-6 px-0 ps-sm-1 ps-0">
                                            <button type="submit" name="submit" class="btn btn-dongker form-control rounded-5">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="my-4 text-center">
                    <a href="<?= base_url() ?>" class="text-secondary text-decoration-none border-bottom border-2 p-1 back"><i class="fa-solid fa-arrow-left arrow-left"></i> Back</a>
                </div> -->
        <?php elseif ($role === 'individual') : ?>
            <div class="mb-5 px-2 px-lg-4">
                <h2><b>Individual</b></h3>
                    <p>Daftar sekarang untuk mendapatkan promo dan penawaran terbaik untuk pendaftaran umrah dan haji dengan harga terbaik dan terbilang cepat.</p>
                    <p class="text-secondary">Sudah punya akun? <a href="login" class=" text-decoration-none text-login-hover">Log in.</a></p>
            </div>
            <div>
                <nav class="">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-login-tab" data-bs-toggle="tab" data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login" aria-selected="true">Data Login</button>
                        <button class="nav-link" id="nav-pribadi-tab" data-bs-toggle="tab" data-bs-target="#nav-pribadi" type="button" role="tab" aria-controls="nav-pribadi" aria-selected="false">Data Pribadi</button>
                    </div>
                </nav>
                <form action="inputRegist" method="post">
                    <?= csrf_field(); ?>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active p-3" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab" tabindex="0">
                            <div class="row mx-0">
                                <div class="col-md-12">
                                    <div class="">
                                        <input type="text" hidden value="<?= $role ?>" name="role">
                                    </div>
                                    <div class="mb-3">
                                        <label for="referral" class="form-label"><b>Kode Referral*</b></label>
                                        <input type="text" placeholder="Masukkan kode referral" class="form-control rounded-5 px-3 py-2 <?= ($validation->hasError('referral')) ? 'is-invalid' : ''; ?>" id="referral" name="referral" value="<?= old('referral'); ?>">
                                        <small class="text-secondary ms-2 mt-2">Tidak wajib diisi*</small>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label"><b>Username*</b></label>
                                        <input type="text" placeholder="Masukkan username" class="form-control rounded-5 px-3 py-2 <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input check-telp" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-validate="<?= ($validation->hasError('hp')) ? "validhp" : "" ?>">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"><small class="text-secondary">Jika tidak punya email, Verifikasi via telepon?</small></label>
                                    </div>
                                    <div id="input-email" class="mb-3">
                                        <label for="email" class="form-label"><b>Email*</b></label>
                                        <input type="text" placeholder="Masukkan Email" class="form-control rounded-5 px-3 py-2 <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <div id="input-hp" class="mb-3" hidden>
                                        <label for="hp" class="form-label"><b>No. Telepon*</b></label>
                                        <input type="text" placeholder="Masukkan No. Telepon" class=" form-control rounded-5 px-3 py-2 <?= ($validation->hasError('hp')) ? 'is-invalid' : ''; ?>" id="hp" name="hp" value="<?= old('hp'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('hp'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label"><b>Password*</b></label>
                                        <div class="position-relative password">
                                            <input type="password" placeholder="Masukkan password" class="form-control rounded-5 ps-3 py-2 pe-5 <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
                                            <a href="" class="see"><i class="fa-solid fa-eye-slash"></i></a>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="password2" class="form-label"><b>Konfirmasi Password*</b></label>
                                        <div class="position-relative password">
                                            <input type="password" placeholder="Masukkan konfirmasi password" class="form-control rounded-5 ps-3 py-2 pe-5 <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="password2" name="password2">
                                            <a href="" class="see"><i class="fa-solid fa-eye-slash"></i></a>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= $validation->getError('password2'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row px-0 mx-0">
                                        <button id="next" type="button" class="btn btn-sea  rounded-5 py-2">Selanjutnya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade p-3 position-relative" id="nav-pribadi" role="tabpanel" aria-labelledby="nav-pribadi-tab" tabindex="0">
                            <div id="loader" class="loader-wrapper d-none">
                                <span class="loader"><span class="loader-inner"></span></span>
                            </div>
                            <div class="row mx-0">
                                <div class="col-md-6">
                                    <div class="mb-3 ">
                                        <label for="file" class="form-label white-space-nowrap">Isi Data Otomatis? Unggah KTP</label>
                                        <input class="form-control rounded-5 px-3 py-2" type="file" id="file" name="file">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control rounded-5 px-3 py-2" name="nama" id="nama" value="<?= old('nama'); ?>" placeholder="Masukkan nama lengkap" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                                        <input type="text" class="form-control rounded-5 px-3 py-2" name="nik" id="nik" max="20" placeholder="Masukkan Nomor Induk Kependudukan" value="<?= old('nik'); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sex" class="form-label">Jenis Kelamin</label>
                                        <div class="">
                                            <select name="sex" id="sex" class="form-select rounded-5 px-3 py-2" aria-label="Default select example">
                                                <option disabled>Pilih Jenis Kelamin</option>
                                                <option selected value="L">Laki - laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Alamat</label>
                                        <input type="text" class="form-control rounded-5 px-3 py-2" id="address" name="address" placeholder="Masukkan alamat" value="<?= old('address'); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="national" class="form-label">Kewarganegaraan</label>
                                        <input type="text" class="form-control rounded-5 px-3 py-2" id="national" name="national" placeholder="Masukkan kewarganegaraan" value="<?= old('national'); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tempat/ Tgl Lahir</label>
                                        <div class="row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control rounded-5 px-3 py-2" id="pob" name="pob" autocomplete="off" value="<?= old('pob'); ?>" placeholder="Tempat lahir" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="date" name="dob" class="form-control rounded-5 px-3 py-2" id="dob" value="<?= old('dob'); ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="padding-top:32px" class="row px-0 mx-0">
                                        <div class="col-sm-6 px-0 mb-sm-1 pe-0 pe-sm-1 mb-3">
                                            <button id="before" type="button" class="btn btn-sea form-control rounded-5">Sebelumnya</button>
                                        </div>
                                        <div class="col-sm-6 px-0 ps-sm-1 ps-0">
                                            <button type="submit" name="submit" class="btn btn-dongker form-control rounded-5">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="my-4 text-center">
                    <a href="<?= base_url() ?>" class="text-secondary text-decoration-none border-bottom border-2 p-1 back"><i class="fa-solid fa-arrow-left arrow-left"></i> Back</a>
                </div> -->
        <?php endif; ?>
    </div>



</div>
<!-- <div class="">
        <h3>Form Pendaftaran</h3>
    </div>
    <div class="row px-0">
        
    </div> -->
<script>
    const inpFile = document.getElementById('file');
    const url = "<?= base_url('user/uploadKTP') ?>";

    const navTab = $("#nav-tab button");
    const tabContent = $("#nav-tabContent div.tab-pane");

    $("#next").on("click", function() {
        activeTab("nav-pribadi-tab", "nav-pribadi");
    });

    $("#before").on("click", function() {
        activeTab("nav-login-tab", "nav-login");
    });

    function activeTab(button, tab) {
        for (let i = 0; i < navTab.length; i++) {
            const navTabI = navTab[i];

            if (button == navTabI.id) {
                navTabI.classList.add("active");
                navTabI.setAttribute("aria-selected", "true");
                navTabI.removeAttribute("tabindex");
            } else {
                navTabI.classList.remove("active");
                navTabI.setAttribute("aria-selected", "false")
                navTabI.setAttribute("tabindex", "-1");
            }
        }

        for (let i = 0; i < tabContent.length; i++) {
            const tabContentI = tabContent[i];

            if (tab == tabContentI.id) {
                tabContentI.classList.add("active");
                tabContentI.classList.add("show");
            } else {
                tabContentI.classList.remove("active");
                tabContentI.classList.remove("show");
            }
        }
    }
    $(document).ready(function() {
        $("#file").on("change", function() {
            const file = $("#file").prop("files")[0];
            var form_data = new FormData();
            form_data.append('file', file);
            // return false;
            $.ajax({
                type: "POST",
                // dataType: "text",
                cache: false,
                contentType: false,
                processData: false,
                url: url,
                data: form_data,
                beforeSend: function() {
                    $("#loader").removeClass('d-none');
                },
                success: function(result) {
                    const jsonParse = JSON.parse(result);
                    // console.log(result);
                    // return false;
                    if (jsonParse['status'] == "sukses") {
                        const dataKTP = JSON.parse(jsonParse['data']);
                        let dob = dataKTP.result.tanggalLahir.value;
                        dob = dob.split("-");
                        dob = dob['2'] + "-" + dob['1'] + "-" + dob["0"];

                        let sex = dataKTP.result.jenisKelamin.value;
                        sex = sex.substr(0, 1);

                        const alamat = dataKTP.result.alamat.value + ", RT." + dataKTP.result.rt.value + "/RW." +
                            dataKTP.result.rw.value + ", Kel. " + dataKTP.result.kelurahanDesa.value + ", Kec. " + dataKTP.result.kecamatan.value + ", " + dataKTP.result.kabupatenKota.value + ", " + dataKTP.result.provinsi.value;

                        $("#nama").val(dataKTP.result.nama.value);
                        $("#nik").val(dataKTP.result.nik.value);
                        $("#pob").val(dataKTP.result.tempatLahir.value);
                        $("#dob").val(dob);
                        $("#address").val(alamat);
                        $("#national").val("Indonesia");

                        const optionSex = $('#sex option');

                        for (let i = 0; i < optionSex.length; i++) {
                            const optionSexI = optionSex[i];

                            if (optionSexI.value == sex) {
                                optionSexI.setAttribute("selected", "");
                            } else {
                                optionSexI.removeAttribute("selected");
                            }
                        }

                        Swal.fire({
                            // position: 'top-end',
                            icon: 'success',
                            title: 'Upload KTP',
                            text: 'Input Data ' + jsonParse['namafile'] + ' Otomatis Menggunakan KTP Berhasil!',
                            // timer: 3000
                        }).then((result) => {
                            $("#loader").addClass('d-none');
                        })
                    } else {
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'error',
                            title: 'Upload KTP Gagal',
                            text: jsonParse['data'],
                            // timer: 3000
                        }).then((result) => {
                            $("#loader").addClass('d-none');
                        })
                    }

                },
                error: function(xhr, thrownError) {
                    Swal.fire({
                        // position: 'top-end',
                        icon: 'error',
                        title: 'Upload KTP Gagal',
                        text: xhr.status + " " + thrownError,
                        // timer: 3000
                    }).then((result) => {
                        $("#loader").addClass('d-none');
                    })
                }
            });
        })
    })
</script>

<?= $this->endSection(); ?>