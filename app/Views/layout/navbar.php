<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;" data-bs-theme="light">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">Admin Portal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto"> <a class="nav-link active" aria-current="page" href="<?= base_url('/') ?>">Home</a>
                <a class="nav-link" href="<?= base_url('pages/students') ?>">Students</a>
                <a class="nav-link" href="<?= base_url('contacts') ?>">Contacts</a>
            </div>

            <div class="navbar-nav">
                <?php if (auth()->loggedIn()): ?>
                    <span class="nav-link text-dark"><strong><?= auth()->user()->username ?></strong></span>
                    <a class="nav-link btn btn-outline-danger btn-sm ms-lg-2" href="<?= base_url('logout') ?>">Logout</a>
                <?php else: ?>
                    <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                    <a class="nav-link" href="<?= base_url('register') ?>">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>