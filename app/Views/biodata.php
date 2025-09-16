<link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Daftar Mahasiswa</h2>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Username</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $row): ?>
            <tr>
                <td><?= $row['username'] ?></td>
                <td><?= $row['nim'] ?? '-' ?></td>
                <td><?= $row['full_name'] ?></td>
                <td class="text-center">
                    <a href="detail/<?= $row['user_id'] ?>" class="btn btn-sm btn-info">Detail</a>
                    <a href="edit/<?= $row['user_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete/<?= $row['user_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus user ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="text-center mb-3">
        <a href="/tambah" class="btn btn-success">+ Tambah User</a>
    </div>
</div>

<?= $this->endSection(); ?>
