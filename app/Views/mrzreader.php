<?= $this->extend('Layout/template') ?>

<?= $this->section('content') ?>

<div class="mt-88 p-5">
    <div>
        <input type="file" required name="paspor" id="paspor">

    </div>
</div>
<script>
    const url = "<?= base_url() ?>/umrah/mrz";

    $(function() {
        $('#paspor').on('change', function() {
            const file = $('#paspor').prop("files")[0];
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
                url: url,
                data: form_data,
                beforeSend: function() {
                    // $("#loader").removeClass('d-none');
                },
                success: function(result) {
                    const jsonParse = JSON.parse(result);
                    const pass = JSON.parse(jsonParse['data']);
                    console.log(pass);
                    return false;
                    if (jsonParse['status'] == "sukses") {
                        const dataMrz = JSON.parse(jsonParse['data']);
                        // console.log(dataMrz);
                        // return false;
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'success',
                            title: 'Upload Paspor',
                            text: 'Input Data ' + jsonParse['namafile'] + ' Otomatis Menggunakan Paspor Berhasil!',
                            // timer: 3000
                        }).then((result) => {
                            // $("#loader").addClass('d-none');
                        })
                    } else {
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'error',
                            title: 'Upload Paspor Gagal',
                            text: result,
                            // timer: 3000
                        }).then((result) => {
                            // $("#loader").addClass('d-none');
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
                        // $("#loader").addClass('d-none');
                    })
                }

            })
        })

    })
</script>
<?= $this->endSection() ?>