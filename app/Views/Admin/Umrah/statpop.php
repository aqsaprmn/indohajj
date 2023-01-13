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
                    <table id="status-populer" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Paket</th>
                                <th>Nama</th>
                                <th class="text-center">status</th>
                                <th class="text-center">populer</th>
                                <th class="text-center" style="width: 10%">Action</th>
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
                                        <td class="text-center"><span class="white-space-nowrap <?= ($p['status'] == "Y") ? "text-success" :  "text-danger"; ?>"><?= ($p['status'] == "Y") ? "Aktif" :  "No-Aktif"; ?></span></td>
                                        <td class="text-center"><span class="white-space-nowrap <?= ($p['populer'] == "Y") ? "text-info" : "text-danger" ?>"><?= ($p['populer'] == "Y") ? "Populer" : "No-Populer" ?></span></td>
                                        <td>
                                            <div class="form-button-action">
                                                <form action="<?= base_url() ?>/adminuser/paketumrah/status/<?= $p['kd_pu'] ?>" method="post" class="mr-1" style="min-width: 100px">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <?php if ($p['status'] == "Y") : ?>
                                                        <button class="btn btn-danger p-2 w-100 btnNonAktif" data-pesan="Non-Aktifkan">
                                                            Non-Aktif
                                                        </button>
                                                    <?php else : ?>
                                                        <button class="btn btn-success p-2 w-100 btnAktif" data-pesan="Aktifkan">
                                                            Aktifkan
                                                        </button>
                                                    <?php endif; ?>
                                                </form>
                                                <form action="<?= base_url() ?>/adminuser/paketumrah/populer/<?= $p['kd_pu'] ?>" method="post" class="mr-1" style="min-width: 100px">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <?php if ($p['populer'] == "Y") : ?>
                                                        <button class="btn btn-danger p-2 w-100 btnNonPopuler" data-pesan="Non-Populerkan">
                                                            Non-Populer
                                                        </button>
                                                    <?php else : ?>
                                                        <button class="btn btn-info p-2 w-100 btnPopuler" data-pesan="Populerkan">
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

        // Paket Umrah
        $('#status-populer').DataTable({
            "pageLength": 5,
        });

        const statusPopuler = document.getElementById('status-populer');

        statusPopuler.addEventListener('click', update);

        function update(e) {
            e.preventDefault();

            const target = e.target;
            const pesan = e.target.getAttribute('data-pesan');

            if (target.classList.contains('btnNonAktif') || target.classList.contains('btnAktif') || target.classList.contains('btnNonPopuler') || target.classList.contains('btnPopuler')) {
                let $form = $(target).closest("form");

                swal({
                    icon: "warning",
                    title: 'Apakah anda yakin ingin ' + pesan + ' ?',
                    text: "Paket Umrah ini akan di " + pesan,
                    buttons: {
                        confirm: {
                            text: 'Ya, ' + pesan,
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
            }
        }
    });
</script>
<?= $this->endSection() ?>