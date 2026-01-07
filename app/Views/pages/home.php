<?= $this->extend('layout\template'); ?>

<?= $this->section('content'); ?>
<div class="container home">
    <div class="row mt-3">
        <div class="col text-center">
            <h1>
                WELCOME TO MY ADMIN PORTAL APP
            </h1>

        </div>
        <div class="row mt-5">
            <div class="col text-center ">
                <h4>
                    This is a mock-up project I make to showcase my skill set in building a web application with a CRUD (create, read, update, delete) system.
                </h4>
                <br>
                <h4>
                    Proceed to students page through <em>Students</em> link on the Navbar.
                </h4>
                <h6>
                    &copy; Belinda Martina
                </h6>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>