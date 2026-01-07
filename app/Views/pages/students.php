<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-6">
            <h1>
                Student List
            </h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal">
                Add Student Data
            </button>
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="keyword" class="form-control" id="keyword" placeholder="Enter Search Keyword" aria-label="Recipient’s username" aria-describedby="basic-addon2" autocomplete="off">
                </div>
            </form>
        </div>
        <div id="student_table_container">
            <?= view('pages/students_table'); ?>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Student</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/pages/add" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" autocomplete="off" class="form-control <?= (session('errors.name')) ? 'is-invalid' : '' ?>" name="name" id="name" value="<?= old('name') ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= validation_show_error('name'); ?>
                    </div>
                    <label for="sn" class="form-label">Student Number</label>
                    <input type="number" autocomplete="off" class="form-control <?= (session('errors.sn')) ? 'is-invalid' : '' ?>" name="sn" id="sn" placeholder="" value="<?= old('sn') ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('sn'); ?>
                    </div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" autocomplete="off" class="form-control <?= (session('errors.email')) ? 'is-invalid' : '' ?>" name="email" id="email" placeholder="" value="<?= old('email') ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('email'); ?>
                    </div>
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="number" autocomplete="off" class="form-control <?= (session('errors.phone')) ? 'is-invalid' : '' ?>" name="phone" id="phone" placeholder="" value="<?= old('phone') ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('phone'); ?>
                    </div>
                    <label for="address" class="form-label">Address</label>
                    <input type="text" autocomplete="off" class="form-control <?= (session('errors.adress')) ? 'is-invalid' : '' ?>" name="adress" id="address" placeholder="" value="<?= old('adress') ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('adress'); ?>
                    </div>
                    <label for="photo" class="form-label">Photo</label>
                    <input class="form-control <?= (session('errors.photo')) ? 'is-invalid' : '' ?>" type="file" id="photo" name="photo" value="<?= old('photo') ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('photo'); ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Student</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        <?php if (session()->getFlashdata('validated')): ?>
            var modalId = '<?= session()->getFlashdata('validated') ?>'
            var formModal = new bootstrap.Modal(document.getElementById(modalId));
            formModal.show();
        <?php endif ?>
    };
</script>
<script>
    $(document).ready(function() {
        // Function to fetch data
        function fetchData(query = '', page = 1) {
            $.ajax({
                url: "<?= base_url('pages/students') ?>", // Update to your route
                method: "GET",
                data: {
                    keyword: query,
                    page_students: page
                },
                success: function(data) {
                    $('#student_table_container').html(data);
                }
            });
        }

        // Trigger on typing (Live Search)
        $('#keyword').on('keyup', function() {
            let query = $(this).val();
            fetchData(query);
        });

        // Handle Pagination Links clicking via AJAX
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page_students=')[1];
            let query = $('#keyword').val();
            fetchData(query, page);
        });
    });
</script>
<?= $this->endSection(); ?>