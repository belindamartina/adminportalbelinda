<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3 mt-5" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../img/<?= $students['Photo']; ?>" class="img-fluid rounded-start" alt="...">
                        <h3 class="card-title text-center mt-3"><?= $students['name'] ?></h3>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">Student Number : <?= $students['sn'] ?></p>
                            <p class="card-text">Email : <?= $students['email'] ?></p>
                            <p class="card-text">Phone Number: <?= $students['phone'] ?></p>
                            <p class="card-text">Address : <?= $students['adress'] ?></p>


                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formEdit">
                                Edit
                            </button>

                            <form action="/students/<?= $students['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            <a href="/pages/students" class="d-block mt-2">Back to Students Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="formEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Student Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/pages/edit/<?= $students['id'] ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" autocomplete="off" class="form-control <?= (session('errors.name')) ? 'is-invalid' : '' ?>" name="name" id="name" value="<?= $students['name']; ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= validation_show_error('name'); ?>
                    </div>
                    <label for="sn" class="form-label">Student Number</label>
                    <input type="number" autocomplete="off" class="form-control <?= (session('errors.sn')) ? 'is-invalid' : '' ?>" name="sn" id="sn" placeholder="" value="<?= $students['sn']; ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('sn'); ?>
                    </div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" autocomplete="off" class="form-control <?= (session('errors.email')) ? 'is-invalid' : '' ?>" name="email" id="email" placeholder="" value="<?= $students['email']; ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('email'); ?>
                    </div>
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="number" autocomplete="off" class="form-control <?= (session('errors.phone')) ? 'is-invalid' : '' ?>" name="phone" id="phone" placeholder="" value="<?= $students['phone']; ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('phone'); ?>
                    </div>
                    <label for="address" class="form-label">Address</label>
                    <input type="text" autocomplete="off" class="form-control <?= (session('errors.adress')) ? 'is-invalid' : '' ?>" name="adress" id="address" placeholder="" value="<?= $students['adress']; ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('adress'); ?>
                    </div>
                    <label for="photo" class="form-label">Photo</label>
                    <input class="form-control <?= (session('errors.photo')) ? 'is-invalid' : '' ?>" type="file" id="photo" name="photo" value="<?= $students['Photo']; ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('photo'); ?>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit Student</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        <?php if (session()->getFlashdata('validated2')): ?>
            var modalId = '<?= session()->getFlashdata('validated2') ?>'
            var formModal = new bootstrap.Modal(document.getElementById(modalId));
            formModal.show();
        <?php endif ?>
    };
</script>
<?= $this->endSection(); ?>