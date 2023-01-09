<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="px-md-5 px-0 py-4 fs-7">
    <div class="px-md-5 pt-4 p-0 mx-md-5 mx-3 my-5">
        <div class="mb-4">
            <a href="<?= base_url() ?>/umrah/<?= $ddu['kd_pu'] ?>" class="text-secondary text-decoration-none"><i class="fa-solid fa-chevron-left me-1"></i> Kembali rencana perjalanan</a>
        </div>
        <div class="mb-4">
            <h5>Informasi Jamaah</h5>
        </div>
        <div class="p-0">
            <form action="<?= base_url() ?>/umrah/inputPligrim" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="text" hidden name="jamaah" value="<?= $jamaah ?>">
                <input type="text" hidden name="kd_pu" value="<?= $ddu['kd_pu'] ?>">
                <input type="text" hidden name="total_paket" value="<?= $totalpaket ?>">
                <?php for ($i = 1; $i <= $jamaah; $i++) : ?>
                    <div class="row mx-0 border border-1 pt-3 px-3 rounded-1 mb-3">
                        <span class="text-dongker mb-3">Informasi Jamaah <?= $i; ?></span>
                        <hr>
                        <nav class="">
                            <div class="nav nav-tabs" id="nav-tab<?= $i ?>" role="tablist">
                                <button class="nav-link active" id="nav-ktp-tab<?= $i ?>" data-bs-toggle="tab" data-bs-target="#nav-ktp<?= $i ?>" type="button" role="tab" aria-controls="nav-ktp<?= $i ?>" aria-selected="true">1. Data KTP</button>
                                <button class="nav-link" id="nav-paspor-tab<?= $i ?>" data-bs-toggle="tab" data-bs-target="#nav-paspor<?= $i ?>" type="button" role="tab" aria-controls="nav-paspor<?= $i ?>" aria-selected="false">2. Data Paspor</button>
                                <button class="nav-link" id="nav-harga-tab<?= $i ?>" data-bs-toggle="tab" data-bs-target="#nav-harga<?= $i ?>" type="button" role="tab" aria-controls="nav-harga<?= $i ?>" aria-selected="false">3. Pemilihan Harga /Penentuan Hotel</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent<?= $i ?>">
                            <div class="tab-pane fade show active pt-2" id="nav-ktp<?= $i ?>" role="tabpanel" aria-labelledby="nav-ktp-tab<?= $i ?>" tabindex="0">
                                <div class="row py-3 mx-0 px-0 d-none framektp<?= $i ?> justify-content-center">
                                    <div style="width: 320px;" class="position-relative border border-1 rounded-2 p-2 col-lg-6">
                                        <img class="w-100 h-100 mb-3" src="" name="imgktp<?= $i ?>" alt="">
                                    </div>
                                </div>
                                <div class="row mx-0 position-relative">
                                    <div id="loader" name="loader<?= $i ?>" class="loader-wrapper d-none">
                                        <span class="loader"><span class="loader-inner"></span></span>
                                    </div>
                                    <div class="row mx-0 px-0">
                                        <div class="col-md-6 px-1">
                                            <div class="mb-3 ">
                                                <label for="file" class="form-label">Isi Data Otomatis? Unggah KTP</label>
                                                <input class="form-control rounded-5 px-3 py-2 ktp<?= $i ?>" type="file" id="" name="ktp<?= $i ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control rounded-5 px-3 py-2 nama<?= $i ?>" name="nama<?= $i ?>" id="" value="<?= old('nama'); ?>" placeholder="Masukkan nama lengkap" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                                                <input type="text" class="form-control rounded-5 px-3 py-2 nik<?= $i ?>" name="nik<?= $i ?>" id="" max="20" placeholder="Masukkan Nomor Induk Kependudukan" value="<?= old('nik'); ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sex" class="form-label">Jenis Kelamin</label>
                                                <div class="">
                                                    <select name="sex<?= $i ?>" id="" class="form-select rounded-5 px-3 py-2 sex<?= $i ?>" aria-label="Default select example">
                                                        <option disabled>Pilih Jenis Kelamin</option>
                                                        <option selected value="L">Laki - laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 px-1">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Alamat</label>
                                                <input type="text" class="form-control rounded-5 px-3 py-2 address<?= $i ?>" id="" name="address<?= $i ?>" placeholder="Masukkan alamat" value="<?= old('address'); ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="national" class="form-label">Kewarganegaraan</label>
                                                <input type="text" class="form-control rounded-5 px-3 py-2 national<?= $i ?>" id="" name="national<?= $i ?>" placeholder="Masukkan kewarganegaraan" value="<?= old('national'); ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Tempat/ Tgl Lahir</label>
                                                <div class="row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control rounded-5 px-3 py-2 pob<?= $i ?>" id="" name="pob<?= $i ?>" autocomplete="off" value="<?= old('pob'); ?>" placeholder="Tempat lahir" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="date" name="dob<?= $i ?>" class="form-control rounded-5 px-3 py-2 dob<?= $i ?>" id="" value="<?= old('dob'); ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-5 row px-0 mx-0">
                                                <button id="" name="next<?= $i ?>" type="button" class="btn btn-sea rounded-5">Selanjutnya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade pt-3 px-0 position-relative" id="nav-paspor<?= $i ?>" role="tabpanel" aria-labelledby="nav-paspor-tab<?= $i ?>" tabindex="0">
                                <div class="row mx-0 px-0 py-3 d-none framepas<?= $i ?> justify-content-center">
                                    <div class="position-relative col-lg-6 border border-1 rounded-2 p-2" style="width: 320px;">
                                        <img class="w-100 h-100 mb-3" src="" name="imgpaspor<?= $i ?>" alt="">
                                    </div>
                                </div>
                                <div class="row mx-0 px-0 position-relative">
                                    <div id="loader" name="loadermrz<?= $i ?>" class="loader-wrapper d-none">
                                        <span class="loader"><span class="loader-inner"></span></span>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="mb-3">
                                            <label for="paspor" class="form-label">Unggah Paspor</label>
                                            <input class="form-control rounded-5 px-3 py-2 paspor<?= $i ?>" type="file" id="" name="paspor<?= $i ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="namapas" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control rounded-5 px-3 py-2 namapas<?= $i ?>" name="namapas<?= $i ?>" id="" value="<?= old('namapas'); ?>" placeholder="Masukkan nama lengkap" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dobpas" class="form-label">Tgl Lahir</label>
                                            <input type="date" class="form-control rounded-5 px-3 py-2 dobpas<?= $i ?>" name="dobpas<?= $i ?>" id="" value="<?= old('dobpas'); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="sexpas" class="form-label">Jenis Kelamin</label>
                                            <div class="">
                                                <select name="sexpas<?= $i ?>" id="" class="form-select rounded-5 px-3 py-2 sexpas<?= $i ?>" aria-label="Default select example">
                                                    <option disabled>Pilih Jenis Kelamin</option>
                                                    <option selected value="L">Laki - laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nationalitypas" class="form-label">Kewarganegaraan</label>
                                            <input type="text" class="form-control rounded-5 px-3 py-2 nationalitypas<?= $i ?>" id="" name="nationalitypas<?= $i ?>" placeholder="Masukkan kewarganegaraan" value="<?= old('nationalitypas'); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nopas" class="form-label">No Paspor</label>
                                            <input type="text" class="form-control rounded-5 px-3 py-2 nopas<?= $i ?>" name="nopas<?= $i ?>" id="" value="<?= old('nopas'); ?>" placeholder="Masukkan no. paspor" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tipepas" class="form-label">Tipe</label>
                                            <div class="">
                                                <select name="tipepas<?= $i ?>" id="" class="form-select rounded-5 px-3 py-2 tipepas<?= $i ?>" aria-label="Default select example">
                                                    <option disabled>Pilih Tipe</option>
                                                    <option selected value="P">P</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="tempatterbitpas" class="form-label">Tempat Dikeluarkan</label>
                                            <input type="text" class="form-control rounded-5 px-3 py-2 tempatterbitpas<?= $i ?>" name="tempatterbitpas<?= $i ?>" id="" value="<?= old('nopaspor'); ?>" placeholder="Masukkan tempat dikeluarkan" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="terbitpas" class="form-label">Tgl Terbit</label>
                                            <input type="date" class="form-control rounded-5 px-3 py-2 terbitpas<?= $i ?>" name="terbitpas<?= $i ?>" id="" value="<?= old('terbitpas'); ?>" required>
                                        </div> -->
                                        <div class="mb-3">
                                            <label for="akhirpas" class="form-label">Tgl Berakhir</label>
                                            <input type="date" class="form-control rounded-5 px-3 py-2 akhirpas<?= $i ?>" name="akhirpas<?= $i ?>" id="" value="<?= old('akhirpas'); ?>" required>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="noregpas" class="form-label">No. Reg</label>
                                            <input type="text" class="form-control rounded-5 px-3 py-2 noregpas<?= $i ?>" id="" name="noregpas<?= $i ?>" placeholder="Masukkan kewarganegaraan" value="<?= old('noregpas'); ?>" required>
                                        </div> -->
                                        <div class="mb-3">
                                            <label for="mrzpas" class="form-label">Kode MRZ</label>
                                            <input type="text" class="form-control rounded-5 px-3 py-2 mrzpas<?= $i ?>" id="" name="mrzpas<?= $i ?>" placeholder="Masukkan kode MRZ" value="<?= old('mrzpas'); ?>" required>
                                        </div>
                                        <div class="mt-5 row px-0 mx-0">
                                            <button id="" name="before<?= $i ?>" type="button" class="btn btn-sea form-control rounded-5">Sebelumnya</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row mx-0 px-1">
                                    <div class="col-sm-12 px-0">
                                        <button id="" name="before<?= $i ?>" type="button" class="btn btn-sea form-control rounded-5">Sebelumnya</button>
                                    </div>
                                </div> -->
                            </div>
                            <div class="tab-pane fade show py-3" id="nav-harga<?= $i ?>" role="tabpanel" aria-labelledby="nav-harga-tab<?= $i ?>" tabindex="0">
                                <div class="row mx-0 position-relative">
                                    <div class="row mx-0 px-0">
                                        <div class="col-md-4 px-1">
                                            <div class="form-check text-center rounded-1 active-radio p-0">
                                                <input class="form-check-input ms-1" type="radio" name="harga<?= $i ?>" checked id="harga-double<?= $i ?>" value="Double_<?= $ddu['harga_double'] ?>">
                                                <label class="form-check-label border border-1 form-control" for="harga-double<?= $i ?>">
                                                    <p>Double</p>
                                                    <span>Rp.
                                                        <?= number_format($ddu["harga_double"], 0, ',', '.') ?>
                                                    </span>
                                                    <div>
                                                        <small class="text-secondary">2 orang /kamar</small>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-check text-center rounded-1 active-radio p-0">
                                                <input class="form-check-input ms-1" type="radio" name="harga<?= $i ?>" value="Triple_<?= $ddu['harga_triple'] ?>" id="harga-triple<?= $i ?>">
                                                <label class="form-check-label border border-1 form-control" for="harga-triple<?= $i ?>">
                                                    <p>Triple</p>
                                                    <span>Rp.
                                                        <?= number_format($ddu["harga_triple"], 0, ',', '.') ?>
                                                    </span>
                                                    <div>
                                                        <small class="text-secondary">3 orang /kamar</small>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-check text-center rounded-1 active-radio p-0">
                                                <input class="form-check-input ms-1" type="radio" name="harga<?= $i ?>" value="Quad_<?= $ddu['harga_quad'] ?>" id="harga-quad<?= $i ?>">
                                                <label class="form-check-label border border-1 form-control" for="harga-quad<?= $i ?>">
                                                    <p>Quad</p>
                                                    <span>Rp.
                                                        <?= number_format($ddu["harga_quad"], 0, ',', '.') ?>
                                                    </span>
                                                    <div>
                                                        <small class="text-secondary">4 orang /kamar</small>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
                <div class="row mx-0 mt-3">
                    <button class="btn btn-orange rounded-5" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Masalah


    function activeTab(navTab, tabContent, button, tab) {
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

    // Input jamaah
    // const inpKtp = document.querySelectorAll(".ktp");
    const urlKtp = "<?= base_url() ?>/user/uploadKTP";
    const urlMrz = "<?= base_url() ?>/umrah/mrz";

    const urlImgKtp = "<?= base_url() ?>/public/upload/ocr/";
    const urlImgPass = "<?= base_url() ?>/public/upload/mrz/";

    for (let i = 1; i <= <?= $jamaah ?>; i++) {

        const navTab = $("#nav-tab" + i + " button");
        const tabContent = $("#nav-tabContent" + i + " div.tab-pane");
        $("[name=next" + i + "]").on("click", function() {
            activeTab(navTab, tabContent, "nav-paspor-tab" + i, "nav-paspor" + i);
        });

        $("[name=before" + i + "]").on("click", function() {
            activeTab(navTab, tabContent, "nav-ktp-tab" + i, "nav-ktp" + i);
        });
        const inpKtp = document.querySelector('.ktp' + i);
        const inpPass = document.querySelector('.paspor' + i);

        $(document).ready(function() {
            inpKtp.addEventListener("change", function() {
                // console.log(this);
                // return false;
                const file = $(this).prop("files")[0];
                // console.log(file);
                var form_data = new FormData();
                form_data.append("file", file);
                // console.log($("[name=loader" + i + "]"));
                // return false;
                $.ajax({
                    type: "POST",
                    // dataType: "text",
                    cache: false,
                    contentType: false,
                    processData: false,
                    url: urlKtp,
                    data: form_data,
                    beforeSend: function() {
                        $("[name=loader" + i + "]").removeClass("d-none");
                    },
                    success: function(result) {
                        const jsonParse = JSON.parse(result);
                        // console.log(result);
                        // return false;
                        // console.log(jsonParse);
                        if (jsonParse["status"] == "sukses") {
                            const dataKTP = JSON.parse(jsonParse["data"]);
                            let dob = dataKTP.result.tanggalLahir.value;
                            dob = dob.split("-");
                            dob = dob["2"] + "-" + dob["1"] + "-" + dob["0"];

                            let sex = dataKTP.result.jenisKelamin.value;
                            sex = sex.substr(0, 1);

                            const alamat =
                                dataKTP.result.alamat.value +
                                ", RT." +
                                dataKTP.result.rt.value +
                                "/RW." +
                                dataKTP.result.rw.value +
                                ", Kel. " +
                                dataKTP.result.kelurahanDesa.value +
                                ", Kec. " +
                                dataKTP.result.kecamatan.value +
                                ", " +
                                dataKTP.result.kabupatenKota.value +
                                ", " +
                                dataKTP.result.provinsi.value;

                            $("[name=nama" + i + "]").val(dataKTP.result.nama.value);
                            $("[name=nik" + i + "]").val(dataKTP.result.nik.value);
                            $("[name=pob" + i + "]").val(dataKTP.result.tempatLahir.value);
                            $("[name=dob" + i + "]").val(dob);
                            $("[name=address" + i + "]").val(alamat);
                            $("[name=national" + i + "]").val("Indonesia");

                            const optionSex = $("[name=sex" + i + "] option");

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
                                icon: "success",
                                title: "Upload KTP",
                                text: "Input Data " +
                                    jsonParse["namafile"] +
                                    " Otomatis Menggunakan KTP Berhasil!",
                                // timer: 3000
                            }).then((result) => {
                                $("[name=loader" + i + "]").addClass("d-none");

                                $(".framektp" + i).removeClass('d-none');

                                $("[name=imgktp" + i + "]").attr('src', urlImgKtp + jsonParse["namafile"]);
                            });
                        } else {
                            Swal.fire({
                                // position: 'top-end',
                                icon: "error",
                                title: "Upload KTP Gagal",
                                text: jsonParse["data"],
                                // timer: 3000
                            }).then((result) => {
                                $("[name=loader" + i + "]").addClass("d-none");
                            });
                        }
                    },
                    error: function(xhr, thrownError) {
                        Swal.fire({
                            // position: 'top-end',
                            icon: "error",
                            title: "Upload KTP Gagal",
                            text: xhr.status + " " + thrownError,
                            // timer: 3000
                        }).then((result) => {
                            $("[name=loader" + i + "]").addClass("d-none");
                        });
                    },
                });
            });

            inpPass.addEventListener("change", function() {
                const file = $(this).prop("files")[0];
                var form_data = new FormData();
                form_data.append('file', file);

                // console.log(form_data.getAll('file  '));
                // return false;
                $.ajax({
                    type: "POST",
                    // dataType: "text",
                    cache: false,
                    contentType: false,
                    processData: false,
                    url: urlMrz,
                    data: form_data,
                    beforeSend: function() {
                        $("[name=loadermrz" + i + "]").removeClass("d-none");
                    },
                    success: function(result) {
                        const jsonParse = JSON.parse(result);
                        // console.log(jsonParse);
                        // return false;
                        if (jsonParse['status'] == "sukses") {
                            const statusCode = JSON.parse(jsonParse['data'])['statusCode'];
                            const textError = JSON.parse(jsonParse['data'])['statusMessage'];
                            // console.log(JSON.parse(jsonParse['data']));
                            if (statusCode != 200) {
                                return Swal.fire({
                                    // position: 'top-end',
                                    icon: 'error',
                                    title: 'Upload Paspor Gagal',
                                    text: textError,
                                    // timer: 3000
                                }).then((result) => {
                                    $("[name=loadermrz" + i + "]").addClass("d-none");
                                })
                            }

                            const dataMrz = JSON.parse(jsonParse['data'])['data']['fields'];
                            const dataMrzHeader = JSON.parse(jsonParse['data'])['data']['header'];

                            $('[name=nopas' + i + "]").val(dataMrz['document_number']);

                            const dateexp = dataMrz['expiry_date'].split('');

                            const expiry = "20" + dateexp[0] + dateexp[1] + "-" + dateexp[2] + dateexp[3] + "-" + dateexp[4] + dateexp[5];

                            const datedob = dataMrz['birth_date'].split('');
                            // console.log(datedob);
                            const year = (datedob[0] + datedob[1] > 20) ? "19" : "20"

                            const month = (datedob[2] == "0") ? "" : "1";

                            const dateob = year + datedob[0] + datedob[1] + "-" + datedob[2] + datedob[3] + "-" + datedob[4] + datedob[5];

                            // console.log(dateob);

                            $('[name=akhirpas' + i + "]").val(expiry);
                            $('[name=namapas' + i + "]").val(dataMrz['name'] + " " + dataMrz['surname']);
                            $('[name=dobpas' + i + "]").val(dateob)
                            $("[name=nationalitypas" + i + "]").val(dataMrz['country_native']);
                            $("[name=mrzpas" + i + "]").val(dataMrzHeader['text']);

                            let sex = (dataMrz['sex'] == "M") ? "L" : "P";

                            const optionSexPas = $("[name=sexpas" + i + "] option");

                            for (let i = 0; i < optionSexPas.length; i++) {
                                const optionSexPasI = optionSexPas[i];

                                if (optionSexPasI.value == sex) {
                                    optionSexPasI.setAttribute("selected", "");
                                } else {
                                    optionSexPasI.removeAttribute("selected");
                                }
                            }

                            const optionTipePas = $("[name=tipepas" + i + "] option");

                            for (let i = 0; i < optionTipePas.length; i++) {
                                const optionTipePasI = optionTipePas[i];

                                if (optionTipePasI.value == dataMrz['document_type']) {
                                    optionTipePasI.setAttribute("selected", "");
                                } else {
                                    optionTipePasI.removeAttribute("selected");
                                }
                            }

                            Swal.fire({
                                // position: 'top-end',
                                icon: 'success',
                                title: 'Upload Paspor',
                                text: 'Input Data ' + jsonParse['namafile'] + ' Otomatis Menggunakan Paspor Berhasil!',
                                // timer: 3000
                            }).then((result) => {
                                $("[name=loadermrz" + i + "]").addClass("d-none");

                                $("[name=imgpaspor" + i + "]").attr('src', urlImgPass + jsonParse["namafile"]);

                                $(".framepas" + i).removeClass('d-none');
                            })
                        } else {
                            Swal.fire({
                                // position: 'top-end',
                                icon: 'error',
                                title: 'Upload Paspor Gagal',
                                text: result,
                                // timer: 3000
                            }).then((result) => {
                                $("[name=loadermrz" + i + "]").addClass("d-none");
                            })
                        }

                    },
                    error: function(xhr, thrownError) {
                        // console.log(xhr, thrownError);
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'error',
                            title: 'Upload Paspor Gagal',
                            text: xhr.status + " " + thrownError,
                            // timer: 3000
                        }).then((result) => {
                            $("[name=loadermrz" + i + "]").addClass("d-none");
                        })
                    }

                })
            })
        });

    }
</script>
<?= $this->endSection(); ?>