<link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<div class="container mt-4">
    <h2 class="mb-4">Edit User</h2>

    <form action="/update/<?= $user['user_id'] ?>" method="post" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['username']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="<?= esc($user['nim'] ?? '') ?>">
        </div>

        <div class="mb-3">
            <label for="full_name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="<?= esc($user['full_name']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password (kosongkan jika tidak ingin diubah)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="d-flex justify-content-between">
            <a href="/user" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
