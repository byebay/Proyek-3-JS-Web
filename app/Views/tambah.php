<link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<div class="container mt-5">
<div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card shadow-sm">
        <div class="card-body">
        <h2 class="mb-4">Tambah User</h2>

        <?php if (session()->getFlashdata('usersuccess')): ?>
            <div class="alert alert-success">
            <?= session()->getFlashdata('usersuccess') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="/simpan" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>


            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>

            <div class="mb-3">
                <label for="full_name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('user') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</div>
