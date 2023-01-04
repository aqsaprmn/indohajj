<?= $this->extend('Admin/index') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div id="statpop">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>

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
                    <a href="<?= base_url() ?>/adminuser/paketumrah/add" class="btn btn-primary">Tambah Paket</a>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="paket-umrah" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Paket</th>
                                <th>Nama</th>
                                <th>status</th>
                                <th>populer</th>
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
                                        <td class="<?= ($p['status'] == "Y") ? "text-success" :  "text-danger"; ?>"><?= ($p['status'] == "Y") ? "Aktif" :  "Tidak Aktif"; ?></td>
                                        <td class="<?= ($p['populer'] == "Y") ? "text-primary" : "text-danger" ?>"><?= ($p['populer'] == "Y") ? "Populer" : "Tidak Populer" ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <form action="<?= base_url() ?>/adminuser/paketumrah/status/<?= $p['kd_pu'] ?>" method="post" class="mr-1" style="min-width: 100px">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <?php if ($p['status'] == "Y") : ?>
                                                        <button href="" class="btn btn-danger p-2 w-100" id="btnNonAktif">
                                                            Non-Aktif
                                                        </button>
                                                    <?php else : ?>
                                                        <button href="" class="btn btn-success p-2 w-100" id="btnAktif">
                                                            Aktifkan
                                                        </button>
                                                    <?php endif; ?>
                                                </form>
                                                <form action="<?= base_url() ?>/adminuser/paketumrah/populer/<?= $p['kd_pu'] ?>" method="post" class="mr-1" style="min-width: 100px">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <?php if ($p['populer'] == "Y") : ?>
                                                        <button href="" class="btn btn-danger p-2 w-100" id="btnNonPopuler">
                                                            Non-Populer
                                                        </button>
                                                    <?php else : ?>
                                                        <button href="" class="btn btn-info p-2 w-100" id="btnPopuler">
                                                            Populerkan
                                                        </button>
                                                    <?php endif; ?>
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

        const statpop = document.getElementById('statpop');
        // console.log(statpop);
        if (statpop) {
            // console.log(approve.innerHTML);
            if (statpop.innerHTML.trim() == 'Saktif') {
                swal({
                    icon: "success",
                    title: 'Aktivasi Sukses',
                    text: 'Aktivasi paket umrah sukses',
                    type: 'success',
                    buttons: {
                        confirm: {
                            text: 'Oke',
                            className: 'btn btn-primary'
                        }
                    }
                });
            } else if (statpop.innerHTML.trim() == 'Gaktif') {
                swal({
                    icon: "error",
                    title: 'Aktivasi Gagal',
                    text: 'Aktivasi paket umrah gagal.',
                    type: 'error',
                    buttons: {
                        confirm: {
                            text: 'Oke',
                            className: 'btn btn-danger'
                        }
                    }
                });
            } else if (statpop.innerHTML.trim() == 'Snonaktif') {
                swal({
                    icon: "success",
                    title: 'Non-Aktif Sukses',
                    text: 'Non-Aktif paket umrah sukses.',
                    type: 'success',
                    buttons: {
                        confirm: {
                            text: 'Oke',
                            className: 'btn btn-danger'
                        }
                    }
                });
            } else if (statpop.innerHTML.trim() == 'Gnonaktif') {
                swal({
                    icon: "error",
                    title: 'Non-Aktif Gagal',
                    text: 'Non-Aktif paket umrah gagal.',
                    type: 'error',
                    buttons: {
                        confirm: {
                            text: 'Oke',
                            className: 'btn btn-danger'
                        }
                    }
                });
            } else if (statpop.innerHTML.trim() == 'Spopuler') {
                swal({
                    icon: "success",
                    title: 'Populer Sukses',
                    text: 'Populer paket umrah sukses',
                    type: 'success',
                    buttons: {
                        confirm: {
                            text: 'Oke',
                            className: 'btn btn-primary'
                        }
                    }
                });
            } else if (statpop.innerHTML.trim() == 'Gpopuler') {
                swal({
                    icon: "error",
                    title: 'Populer Gagal',
                    text: 'Populer paket umrah gagal.',
                    type: 'error',
                    buttons: {
                        confirm: {
                            text: 'Oke',
                            className: 'btn btn-danger'
                        }
                    }
                });
            } else if (statpop.innerHTML.trim() == 'Snonpopuler') {
                swal({
                    icon: "success",
                    title: 'Non-Populer Sukses',
                    text: 'Non-Populer paket umrah sukses.',
                    type: 'success',
                    buttons: {
                        confirm: {
                            text: 'Oke',
                            className: 'btn btn-danger'
                        }
                    }
                });
            } else if (statpop.innerHTML.trim() == 'Gnonpopuler') {
                swal({
                    icon: "error",
                    title: 'Non-Populer Gagal',
                    text: 'Non-Populer agent gagal.',
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
                    title: 'Proses Gagal',
                    text: 'Proses paket umrah gagal, data tidak ditemukan.',
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

        update('form #btnAktif', 'aktifkan');
        update('form #btnNonAktif', 'non-aktifkan');
        update('form #btnPopuler', 'populerkan');
        update('form #btnNonPopuler', 'non-populerkan');

        function update($target, $pesan) {
            $($target).click(function(e) {
                e.preventDefault();

                let $form = $(this).closest("form");
                // console.log($form);
                swal({
                    icon: "warning",
                    title: 'Apakah anda yakin ingin ' + $pesan + ' ?',
                    text: "Paket Umrah ini akan di " + $pesan,
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Ya, ' + $pesan,
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
        }
    });
</script>
<?= $this->endSection() ?>