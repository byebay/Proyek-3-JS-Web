<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<h3 class="mb-3">Pilih Mata Kuliah</h3>

<form action="/matakuliah-mhs/store" method="post" id="formMatkul">
    <?= csrf_field() ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Pilih</th>
                <th>Nama Mata Kuliah</th>
                <th class="text-center">SKS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td class="text-center">
                        <input type="checkbox" 
                                name="courses[]" 
                                value="<?= $course['course_id'] ?>" 
                                data-credits="<?= $course['credits'] ?>"
                                <?= in_array($course['course_id'], $takenCourses) ? 'checked disabled' : '' ?>>
                    </td>
                    <td><?= esc($course['course_name']) ?></td>
                    <td class="text-center"><?= esc($course['credits']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="mt-3">
        <strong>Total SKS: </strong> <span id="totalSKS">0</span>
    </div>

    <div class="mt-3 text-center">
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>

<script>
function updateTotalSKS() {
    let total = 0;
    document.querySelectorAll('input[name="courses[]"]:checked').forEach(cb => {
        total += parseInt(cb.dataset.credits) || 0;
    });
    document.getElementById('totalSKS').textContent = total;
}

document.querySelectorAll('input[name="courses[]"]').forEach(cb => {
    cb.addEventListener('change', updateTotalSKS);
});

updateTotalSKS();
</script>

<?= $this->endSection() ?>