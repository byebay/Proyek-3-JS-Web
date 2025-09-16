<link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<div class="container mt-4">
    <?php
    $dataUser = $user ?? $mhs ?? null;

    if (! $dataUser) : ?>
        <div class="alert alert-warning">Data tidak tersedia.</div>
        <a href="<?= base_url('user') ?>" class="btn btn-secondary mt-2">Kembali</a>
    <?php else: ?>
        <h2 class="mb-4 text-primary">Detail User</h2>

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <?= esc($dataUser['full_name'] ?? ($dataUser['nama_lengkap'] ?? 'Nama tidak tersedia')) ?>
            </div>
            <ul class="list-group list-group-flush">
                
                <?php if (isset($dataUser['username'])): ?>
                    <li class="list-group-item"><b>Username:</b> <?= esc($dataUser['username']) ?></li>
                <?php endif; ?>

                <?php if (isset($dataUser['nim'])): ?>
                    <li class="list-group-item"><b>NIM:</b> <?= esc($dataUser['nim']) ?></li>
                <?php endif; ?>

                <?php if (isset($dataUser['full_name'])): ?>
                    <li class="list-group-item"><b>Nama Lengkap:</b> <?= esc($dataUser['full_name']) ?></li>
                <?php endif; ?>

                <?php if (isset($dataUser['role'])): ?>
                    <li class="list-group-item"><b>Role:</b> <?= esc(ucfirst($dataUser['role'])) ?></li>
                <?php endif; ?>

                <?php if (isset($dataUser['jenis_kelamin'])): ?>
                    <li class="list-group-item"><b>Jenis Kelamin:</b>
                        <?= $dataUser['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?>
                    </li>
                <?php endif; ?>

                <?php if (isset($dataUser['tanggal_lahir'])): ?>
                    <li class="list-group-item"><b>Tanggal Lahir:</b> <?= esc($dataUser['tanggal_lahir']) ?></li>
                <?php endif; ?>
                
                <?php if (!empty($takenCourses)): ?>
                    <li class="list-group-item">
                        <b>Mata Kuliah yang diambil:</b>
                        <ul class="mb-0">
                            <?php foreach ($takenCourses as $course): ?>
                                <li><?= esc($course['course_name']) ?> (<?= esc($course['credits']) ?> SKS)</li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="list-group-item"><b>Mata Kuliah yang diambil:</b> Belum ada</li>
                <?php endif; ?>

            </ul>
            <div class="card-body">
                <a href="<?= base_url('user') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    <?php endif; ?>
</div>
