<link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
            <h2 class="mb-4">Edit Mata Kuliah</h2>

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

            <form id="editCourseForm" action="/updatematakuliah/<?= $course['course_id'] ?>" method="post">
                <div class="mb-3">
                    <label for="course_name" class="form-label">Nama Mata Kuliah</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="course_name" 
                        name="course_name" 
                        value="<?= esc($course['course_name']) ?>">
                    <div class="text-danger small" id="courseNameError"></div>
                </div>

                <div class="mb-3">
                    <label for="credits" class="form-label">Jumlah SKS</label>
                    <input 
                        type="number" 
                        class="form-control" 
                        id="credits" 
                        name="credits" 
                        value="<?= esc($course['credits']) ?>" 
                        min="1" max="6">
                    <div class="text-danger small" id="creditsError"></div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/matakuliah" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("editCourseForm").addEventListener("submit", function(e) {
        let isValid = true;

        // Ambil field
        let courseName = document.getElementById("course_name");
        let credits = document.getElementById("credits");

        // Reset error
        document.getElementById("courseNameError").textContent = "";
        document.getElementById("creditsError").textContent = "";

        // Validasi 
        if (courseName.value.trim() === "") {
            document.getElementById("courseNameError").textContent = "Nama mata kuliah wajib diisi.";
            isValid = false;
        } else if (courseName.value.length < 3) {
            document.getElementById("courseNameError").textContent = "Nama mata kuliah minimal 3 karakter.";
            isValid = false;
        }

        if (credits.value.trim() === "") {
            document.getElementById("creditsError").textContent = "Jumlah SKS wajib diisi.";
            isValid = false;
        } else if (parseInt(credits.value) < 1) {
            document.getElementById("creditsError").textContent = "Jumlah SKS minimal 1.";
            isValid = false;
        } else if (parseInt(credits.value) > 6) {
            document.getElementById("creditsError").textContent = "Jumlah SKS maksimal 6.";
            isValid = false;
        }

        // Cegah submit jika tidak valid
        if (!isValid) {
            e.preventDefault();
        }
    });
</script>
