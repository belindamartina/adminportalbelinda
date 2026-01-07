<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">'
    <div class="row mb-3">
        <h2>Contact Me</h2>
    </div>
    <div class="row">
        <ul style="list-style: none;">
            <li><i class="bi bi-github"></i> : <a href="https://github.com/belindamartina">Belinda Martina</a></li>
            <li><i class="bi bi-linkedin"></i> : <a href="https://www.linkedin.com/in/belinda-martina-7a6939176">Belinda Martina</a></li>
            <li><i class="bi bi-envelope-at"></i> : justcallmeby@gmail.com
            <li><i class="bi bi-whatsapp"></i> : +62 895 1539 1068
        </ul>
    </div>
</div>

<?= $this->endSection(); ?>