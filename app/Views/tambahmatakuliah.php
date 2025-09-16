<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<h3 class="text-center mb-3">Tambah Mata Kuliah</h3>

<form action="/courses/store" method="post">
    <div class="mb-3">
        <label for="course_name" class="form-label">Nama Mata Kuliah</label>
        <input type="text" name="course_name" id="course_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="credits" class="form-label">Jumlah SKS</label>
        <input type="number" name="credits" id="credits" class="form-control" required min="1">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/matakuliah" class="btn btn-secondary">Batal</a>
    </div>
</form>

<?= $this->endSection() ?>
