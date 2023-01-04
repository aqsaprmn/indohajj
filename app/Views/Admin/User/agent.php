<?= $this->extend('Admin/index') ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('agent')) : ?>
    <div id="mAprove" class="d-none">
        <?= session()->getFlashdata('agent'); ?>
    </div>
<?php endif; ?>
<div class="row mx-0 p-3">
    <div class="col-md-12 mb-3">
        <h1>
            Daftar <?= $title ?>
        </h1>
    </div>

    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <!-- Modal -->

                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Hp</th>
                                <th>Date Registration</th>
                                <th>Status</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($agent as $agn) : ?>
                                <tr>
                                    <td><?= $agn['username'] ?></td>
                                    <td><?= $agn['email'] ?></td>
                                    <td><?= $agn['hp'] ?></td>
                                    <td><?= date('d-m-Y H:i:s', strtotime($agn['created_at'])) ?></td>
                                    <td><?= ($agn['status_approval']) == 'N' ? '<span class="text-danger">Belum Di Approve</span>' : '<span class="text-success">Sudah Approve</span>'; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <form action="<?= base_url() ?>/adminuser/user/<?= $agn['id'] ?>" method="post">
                                                <?= csrf_field() ?><input type="hidden" name="_method" value="PUT">
                                                <?php if ($agn['status_approval'] == 'N') : ?>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn p-1 btn-primary btn-lg" id="approve" data-original-title="Approve">
                                                        <i class="fa fa-edit"></i> Approve
                                                    </button>
                                                <?php else : ?>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn p-1 btn-danger btn-lg" id="approve" data-original-title="Approve">
                                                        <i class="fa fa-times"></i> Unapprove
                                                    </button>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        // var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        // $('#addRowButton').click(function() {
        //     $('#add-row').dataTable().fnAddData([
        //         $("#addName").val(),
        //         $("#addPosition").val(),
        //         $("#addOffice").val(),
        //         action
        //     ]);
        //     $('#addRowModal').modal('hide');
        // });

        $('form #approve').click(function(e) {
            let $form = $(this).closest("form");
            // console.log($form);
            swal({
                icon: "warning",
                title: 'Apakah anda yakin untuk approve?',
                text: "Agent ini akan melakukan banyak aktivitas di sistem",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Ya, Approve',
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