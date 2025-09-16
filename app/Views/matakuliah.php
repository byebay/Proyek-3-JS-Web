<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Daftar Mata Kuliah</h3>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($courses)) : ?>
            <?php foreach ($courses as $c) : ?>
                <tr>
                    <td><?= $c['course_name'] ?></td>
                    <td><?= $c['credits'] ?></td>
                    <td class="text-center">
                        <a href="/editmatakuliah/<?= $c['course_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/courses/delete/<?= $c['course_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus mata kuliah ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="4" class="text-center">Belum ada data mata kuliah.</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>
<div class="text-center mb-3">
    <a href="/tambahmatakuliah" class="btn btn-success">+ Tambah Mata Kuliah</a>
</div>

<?= $this->endSection() ?>
