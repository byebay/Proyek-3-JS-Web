<link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<div class="container mt-5">
<div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card shadow-sm">
        <div class="card-body">
        <h2 class="mb-4">Tambah Mata Kuliah</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form id="courseForm" action="/courses/store" method="post">
            <div class="mb-3">
                <label for="course_name" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="course_name" name="course_name">
                <div class="text-danger small" id="courseNameError"></div>
            </div>

            <div class="mb-3">
                <label for="credits" class="form-label">Jumlah SKS</label>
                <input type="number" class="form-control" id="credits" name="credits" min="1">
                <div class="text-danger small" id="creditsError"></div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('matakuliah') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</div>

<script>
    document.getElementById("courseForm").addEventListener("submit", function(e) {
        let isValid = true;

        // Ambil field
        let courseName = document.getElementById("course_name");
        let credits = document.getElementById("credits");

        // Reset error
        document.getElementById("courseNameError").textContent = "";
        document.getElementById("creditsError").textContent = "";

        // Reset class
        courseName.classList.remove("is-invalid");
        credits.classList.remove("is-invalid");

        // Validasi
        if (courseName.value.trim() === "") {
            document.getElementById("courseNameError").textContent = "Nama mata kuliah wajib diisi.";
            courseName.classList.add("is-invalid");
            isValid = false;
        }

        if (credits.value.trim() === "") {
            document.getElementById("creditsError").textContent = "Jumlah SKS wajib diisi.";
            credits.classList.add("is-invalid");
            isValid = false;
        } else if (parseInt(credits.value) < 1) {
            document.getElementById("creditsError").textContent = "Jumlah SKS minimal 1.";
            credits.classList.add("is-invalid");
            isValid = false;
        }

        // Cegah submit jika tidak valid
        if (!isValid) {
            e.preventDefault();
        }
    });
</script>
