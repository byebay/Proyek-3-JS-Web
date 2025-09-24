<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Akademik Mini</title>
    <link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>

<div class="container my-4">
    <div class="bg-primary text-white text-center p-3 rounded">
        <h2>Sistem Akademik</h2>
    </div>

    <?php
    $uri = service('uri'); 
    $role = session()->get('role');
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light my-3 rounded">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $uri->getSegment(1) == 'home' ? 'active fw-bold text-primary' : '' ?>" href="/home">Home</a>
                    </li>

                    <?php if($role == 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $uri->getSegment(1) == 'matakuliah' ? 'active fw-bold text-primary' : '' ?>" href="/matakuliah">Mata Kuliah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $uri->getSegment(1) == 'user' ? 'active fw-bold text-primary' : '' ?>" href="/user">Data Mahasiswa</a>
                        </li>
                    <?php elseif($role == 'mahasiswa'): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $uri->getSegment(1) == 'matakuliah-mhs' ? 'active fw-bold text-primary' : '' ?>" href="/matakuliah-mhs">Mata Kuliah</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <?= $this->renderSection('content'); ?>
        </div>
    </div>

    <div class="bg-dark text-white text-center p-2 rounded">
        <b>Bandung - Jawa Barat</b>
    </div>

    <div class="mt-3 text-center">
        <a href="/logout" class="btn btn-warning btn-sm">Logout</a>
    </div>
</div>

<script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('js/script.js'); ?>"></script>
</body>
</html>
