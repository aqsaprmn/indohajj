<?= $this->extend('Admin/index') ?>

<?= $this->section('content') ?>
<?php if (session()->has('remaining')) : ?>
    <div hidden id="remaining">
        <?= session()->get('remaining'); ?>
    </div>
<?php endif; ?>
<div class="row mx-0 p-3">
    <div class="col-md-12 p-3">
        <div class="card">

            <div class="card-body">
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
                                <th>Nama</th>
                                <th>Tanggal Keberangkatan</th>
                                <th>Ketersediaan</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($pp)) : ?>
                                <?php $no = 1; ?>
                                <?php foreach ($pp as $p) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $p['kd_pu'] ?></td>
                                        <td><?= $p['nama'] ?></td>

                                        <td class="text-center"><?= date('d-m-Y', strtotime($p['tgl_berangkat'])) ?></td>

                                        <td class="text-center"><?= $p['remaining'] ?></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#remaining-<?= $p['kd_pu'] ?>">
                                                Edit <i class="fa-regular ml-1 fa-pen-to-square"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="remaining-<?= $p['kd_pu'] ?>" tabindex="-1" aria-labelledby="remaining-<?= $p['kd_pu'] ?>Label" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="<?= base_url() ?>/adminuser/paketumrah/remainded" method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="remaining-<?= $p['kd_pu'] ?>Label"><?= $p['kd_pu'] ?> - <?= $p['nama'] ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="text" hidden value="<?= $p['kd_pu'] ?>" name="kd_pu">
                                                                <input class="form-control rounded p-2" type="number" name="remaining" value="<?= $p['remaining'] ?>" min="0">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
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