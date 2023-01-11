<?= $this->extend('Layout/template') ?>

<?= $this->section('content'); ?>

<div style="position: relative;height: 100vh" class="container-fluid d-flex flex-column justify-content-center align-items-center">
    <div style="height: 50px; width: 100px" class="mb-3 text-center">
        <i id="light" class="fa-solid fa-lightbulb fs-1"></i>
    </div>
    <h6 class="mb-3">Indohajj / Administrator - <span class="text-dongker"><?= $title; ?></span></h6>
    <h5 id="comingsoon" class="text-secondary">Segera Datang</h5>
</div>

<script>
    setInterval(function() {
        const i = document.getElementById('light');

        if (i.classList.contains('fa-solid')) {
            i.classList.replace('fa-solid', 'fa-regular')
        } else {
            i.classList.replace('fa-regular', 'fa-solid')
        }
    }, 1000)

    setInterval(function() {
        const t = document.getElementById('comingsoon');
        const v = t.innerHTML;
        const p = ".";

        t.innerHTML = v + p;

        if (t.innerHTML.indexOf('....') == 13) {
            const split = t.innerHTML.split('.');

            t.innerHTML = split[0];
        }

    }, 500)
</script>

<?= $this->endSection(); ?>