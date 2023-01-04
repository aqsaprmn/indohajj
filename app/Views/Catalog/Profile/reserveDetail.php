<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="pt-80 px-md-5 px-4 py-5">
    <div class="row px-0 mx-md-5 mx-0 pt-3 mt-4">
        <h3 class="px-0">
            Detail Reservasi
        </h3>
        <small class="text-secondary px-0">Informasi detail terakit reservasi dengan kode </small>
    </div>
    <div class="row my-4 mx-md-5 mx-0 px-0 position-relative overflow-x-auto">

    </div>
</div>
<script>
    $(function() {
        var info_reserve = $('#info-reserve').DataTable({
            ordering: false
        });

    })
</script>
<?= $this->endSection(); ?>