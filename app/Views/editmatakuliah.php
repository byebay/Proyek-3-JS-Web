<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<h3 class="text-center mb-3">Edit Mata Kuliah</h3>

<form action="/updatematakuliah/<?= $course['course_id'] ?>" method="post">
    <div class="mb-3">
        <label for="course_name" class="form-label">Nama Mata Kuliah</label>
        <input type="text" name="course_name" id="course_name" value="<?= $course['course_name'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="credits" class="form-label">Jumlah SKS</label>
        <input type="number" name="credits" id="credits" value="<?= $course['credits'] ?>" class="form-control" required min="1">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/matakuliah" class="btn btn-secondary">Batal</a>
    </div>
</form>

<?= $this->endSection() ?>
