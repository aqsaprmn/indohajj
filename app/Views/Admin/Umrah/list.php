<?= $this->extend('Admin/index') ?>

<?= $this->section('content') ?>

<?php if (session()->has('pesan')) : ?>
    <div hidden id="list-umrah">
        <?= session()->get('pesan'); ?>
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
                                <th>Tipe</th>
                                <th>Tanggal Keberangkatan</th>
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

                                        <td><?= $p['tipe'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($p['tgl_berangkat'])) ?></td>
                                        <!-- <td>Rp. <?= number_format($p['harga_double'], 0, ',', '.') ?></td>

                                        <td>Rp. <?= number_format($p['harga_triple'], 0, ',', '.') ?></td>

                                        <td>Rp. <?= number_format($p['harga_quad'], 0, ',', '.') ?></td> -->
                                        <td>
                                            <div class="form-button-action">
                                                <a href="<?= base_url() ?>/adminuser/paketumrah/<?= $p['kd_pu'] ?>" class="btn btn-primary p-2 ms-1">Edit <i class="fas fa-edit"></i></a>
                                                <form action="<?= base_url() ?>/adminuser/paketumrah/<?= $p['id'] ?>" method="post" class="ml-1 form-umrah-delete">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="" class="btn btn-danger p-2 btn-umrah-delete">
                                                        Delete <i class="fas fa-trash"></i>
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

        // Paket Umrah
        $('#paket-umrah').DataTable({
            "pageLength": 5,
        });

        const paketUmrah = document.getElementById('paket-umrah');

        paketUmrah.addEventListener('click', function(e) {
            e.preventDefault();
            const target = e.target;

            if (target.classList.contains('btn-umrah-delete')) {
                const btnDelete = target;

                let $form = $(target).closest("form");

                swal({
                    icon: "warning",
                    title: 'Apakah anda yakin hapus paket?',
                    text: "Paket Umrah ini akan di hapus",
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
            } else {
                window.location = target.href;
            }
        })
    });
</script>
<?= $this->endSection() ?>