<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<h3>Daftar Mata Kuliah</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Mata Kuliah</th>
            <th class="text-center">SKS</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($courses as $course): ?>
        <tr>
            <td><?= $course['course_id'] ?></td>
            <td><?= $course['course_name'] ?></td>
            <td class="text-center"><?= $course['credits'] ?></td>
            <td class="text-center">
                <?php if(in_array($course['course_id'], $takenCourses)): ?>
                    <span class="btn btn-success btn-sm disabled">Sudah diambil</span>
                <?php else: ?>
                    <a href="/matakuliah-mhs/take/<?= $course['course_id'] ?>" class="btn btn-primary btn-sm">Ambil</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
