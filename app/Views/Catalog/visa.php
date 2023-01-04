<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<div class="px-3 py-4">
    <div class="px-2 mb-3">
        <h3><span class="text-b-brown">Pembuatan</span> <span class="text-b-blue">Visa Umroh</span></h3>
    </div>
    <div class="row px-3">
        <!-- <form class="" action="visa/saveVisa/" method="post">
            <div class="p-3 rounded shadow-lg mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Informasi Passport</h5>
                        <hr>
                        <div class="mb-3 row">
                            <label for="textemail" class="col-sm-3 col-form-label">No Passport</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nopass" value="" name="nopass" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="negara" class="col-sm-3 col-form-label">Negara</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="negara" autocomplete="off" id="negara" value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="pi" class="col-sm-3 col-form-label">Tempat Dikeluarkan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pi" autocomplete="off" id="pi">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="di" class="col-sm-3 col-form-label">Tgl Cetak</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="di" id="di">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="de" class="col-sm-3 col-form-label">Tgl Masa Berlaku</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="de" name="de">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="filepass" class="col-sm-3 col-form-label">Unggah Passport</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" name="filepass" id="filepass">
                            </div>
                        </div>
                        <div class="mb-3 row m-0 p-0">
                            <button class="btn-brown text-white rounded p-2 border-0">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
     -->
        <nav class="">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-login-tab" data-bs-toggle="tab" data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login" aria-selected="true">Informasi Passport</button>
                <button class="nav-link" id="nav-pribadi-tab" data-bs-toggle="tab" data-bs-target="#nav-pribadi" type="button" role="tab" aria-controls="nav-pribadi" aria-selected="false">Informasi Pribadi</button>
            </div>
        </nav>
        <form action="visa/saveVisa" method="post">
            <?= csrf_field(); ?>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active py-3 px-0" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab" tabindex="0">
                    <div class="row mx-0">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="textemail" class="col-sm-3 col-form-label">No Passport</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nopass" value="<?= old('nopass'); ?>" name="nopass" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="negara" class="col-sm-3 col-form-label">Negara</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="negara" autocomplete="off" id="negara" value="<?= old('negara'); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="pi" class="col-sm-3 col-form-label">Tempat Dikeluarkan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="pi" autocomplete="off" id="pi" value="<?= old('pi'); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="di" class="col-sm-3 col-form-label">Tgl Cetak</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="di" id="di" <?= old('di'); ?>>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="de" class="col-sm-3 col-form-label">Tgl Masa Berlaku</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="de" name="de" <?= old('de'); ?>>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="filepass" class="col-sm-3 col-form-label">Unggah Passport</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="filepass" id="filepass">
                                </div>
                            </div>
                            <div class="mb-3 row px-0 mx-0">
                                <button id="next" type="button" class="btn btn-info">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade py-3 px-0 position-relative" id="nav-pribadi" role="tabpanel" aria-labelledby="nav-pribadi-tab" tabindex="0">
                    <div id="loader" class="loader-wrapper d-none">
                        <span class="loader"><span class="loader-inner"></span></span>
                    </div>
                    <div class="row mx-0">
                        <div class="col-md-6">
                            <div class="mb-3 ">
                                <label for="file" class="form-label">Isi Data Otomatis? Unggah KTP</label>
                                <input class="form-control" type="file" id="file" name="file">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Panjang</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= old('nama'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                                <input type="text" class="form-control" name="nik" id="nik" max="20" value="<?= old('nik'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="sex" class="form-label">Jenis Kelamin</label>
                                <div class="">
                                    <select name="sex" id="sex" class="form-select" aria-label="Default select example">
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
                                <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?= old('address'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="national" class="form-label">Kewarganegaraan</label>
                                <input type="text" class="form-control" id="national" name="national" placeholder="" value="<?= old('national'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tempat/ Tgl Lahir</label>
                                <div class="row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" id="pob" name="pob" autocomplete="off" value="<?= old('pob'); ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="date" name="dob" class="form-control" id="dob" value="<?= old('dob'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="hp" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="" value="<?= old('hp'); ?>">
                            </div>
                            <div class="mb-3 row mx-0">
                                <div class="col-sm-6 px-0 mb-sm-1 pe-0 pe-sm-1 mb-3">
                                    <button id="before" type="button" class="btn btn-info form-control">Sebelumnya</button>
                                </div>
                                <div class="col-sm-6 px-0 ps-sm-1 ps-0">
                                    <button type="submit" name="submit" class="btn btn-primary form-control">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?= base_url() ?>/public/asset/vendor/sweetalert/dist/sweetalert2.all.js"></script>
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
                    console.log(xhr.responseJSON);
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