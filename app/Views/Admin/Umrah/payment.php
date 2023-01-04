<?= $this->extend('Admin/index') ?>

<?= $this->section('content') ?>

<div class="row mx-0 p-3">
    <div class="col-md-12 p-3">
        <div class="card">

            <div class="card-body">
                <!-- Modal -->
                <div class="mb-3 row justify-content-between px-3">
                    <div class="">
                        <h1>
                            <?= $title ?>
                        </h1>
                    </div>

                </div>
                <hr>
                <div class="table-responsive">
                    <table id="paket-umrah" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Paket</th>
                                <th>Gambar Bukti Pembayaran</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($pp)) : ?>
                                <?php $no = 1; ?>
                                <?php foreach ($pp as $p) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $p['kd_booking'] ?></td>
                                        <td><?= $p['img_proof_payment'] ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <form action="<?= base_url() ?>/adminuser/paketumrah/<?= $p['id'] ?>" method="post" class="mr-1">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="" class="btn btn-danger p-2 " id="btnDelete">
                                                        Confirm <i class="fas fa-trash"></i>
                                                    </a>
                                                </form>


                                            </div>
                                        </td>
                                    </tr>
                                    <?php $no++ ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        const approve = document.getElementById('mAprove');
        if (approve) {
            console.log(approve.innerHTML);
            if (approve.innerHTML.trim() == 'suksesap') {
                swal({
                    icon: "success",
                    title: 'Approve Sukses',
                    text: 'Approve agent sukses',
                    type: 'success',
                    buttons: {
                        confirm: {
                            text: 'Oke',
                            className: 'btn btn-primary'
                        }
                    }
                });
            } else if (approve.innerHTML.trim() == 'gagalap') {
                swal({
                    icon: "error",
                    title: 'Approve Gagal',
                    text: 'Approve agent gagal.',
                    type: 'error',
                    buttons: {
                        confirm: {
                            text: 'Oke',
                            className: 'btn btn-danger'
                        }
                    }
                });
            } else if (approve.innerHTML.trim() == 'suksesunap') {
                swal({
                    icon: "success",
                    title: 'Unapprove Sukses',
                    text: 'Unapprove agent sukses.',
                    type: 'success',
                    buttons: {
                        confirm: {
                            text: 'Oke',
                            className: 'btn btn-danger'
                        }
                    }
                });
            } else if (approve.innerHTML.trim() == 'gagalunap') {
                swal({
                    icon: "error",
                    title: 'Unapprove Gagal',
                    text: 'Unapprove agent gagal.',
                    type: 'error',
                    buttons: {
                        confirm: {
                            text: 'Oke',
                            className: 'btn btn-danger'
                        }
                    }
                });
            } else {
                swal({
                    icon: "error",
                    title: 'Approve Gagal',
                    text: 'Approve agent gagal, data tidak ditemukan.',
                    type: 'error',
                    buttons: {
                        confirm: {
                            text: 'Oke',
                            className: 'btn btn-danger'
                        }
                    }
                });
            }
        }

        // Paket Umrah
        $('#paket-umrah').DataTable({
            "pageLength": 5,
        });

        $('form #btnDelete').click(function(e) {
            e.preventDefault();
            let $form = $(this).closest("form");
            // console.log($form);
            swal({
                icon: "warning",
                title: 'Apakah anda yakin hapus paket?',
                text: "Paket Umrah ini akan di hapus",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Ya, Hapus',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-danger'
                    }
                }
            }).then((confirm) => {
                if (confirm) {
                    $form.submit();
                } else {
                    swal.close();
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>