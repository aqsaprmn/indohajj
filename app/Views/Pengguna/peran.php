<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row mx-0 mb-5 px-0">
    <div class="col-lg-6 p-sm-5 p-3">
        <div class="mb-5">
            <h5>Beri tahu saya, anda mendaftar sebagai apa?</h5>
        </div>
        <a href="user/individual" class="text-decoration-none text-black d-flex align-items-center rounded-2 shadow hover-lg mb-2">
            <div class="mx-4 my-3">
                <i style="width: 20px; height: 20px;" class="fa-solid fa-user p-2  rounded-circle shadow bg-warning"></i>
            </div>
            <div class="">
                <span>
                    Kamu mendaftar sebagai <b>Individual</b>.
                </span>
            </div>
            <div class="ms-auto px-3">
                <i style="font-size: 1.6rem" class="fa-solid fa-arrow-right-to-bracket"></i>
            </div>
        </a>
        <a href="user/agent" class="text-decoration-none text-black d-flex align-items-center rounded-2 shadow hover-lg">
            <div class="mx-4 my-3">
                <i style="width: 20px; height: 20px;" class="fa-solid fa-user-tie p-2 bg-info rounded-circle shadow"></i>
            </div>
            <div class="">
                <span>
                    Kamu mendaftar sebagai <b>Agent</b>.
                </span>
            </div>
            <div class="ms-auto px-3">
                <i style="font-size: 1.6rem" class="fa-solid fa-arrow-right-to-bracket"></i>
            </div>
        </a>
        <div class="my-4 text-center">
            <a href="<?= base_url() ?>" class="text-secondary text-decoration-none border-bottom border-2 p-1 back"><i class="fa-solid fa-arrow-left arrow-left"></i> Back</a>
        </div>
    </div>
    <div id="" style="height: 630px;" class="login-backdrop rounded-2 col-lg-6 d-flex flex-column justify-content-end align-items-center py-4">
        <div class="bg-light p-3 rounded-5 mb-5">
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
        <div class="px-lg-5 px-0 text-center">
            <p class="text-white fs-5">Sudah terdaftar? </p>
            <a href="user/login" class="btn btn-warning rounded-5 px-5 py-3">Login</a>
        </div>
    </div>
</div>
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