<link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<div class="container mt-5">
<div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card shadow-sm">
        <div class="card-body">
        <h2 class="mb-4">Tambah User</h2>

        <?php if (session()->getFlashdata('usersuccess')): ?>
            <div class="alert alert-success">
            <?= session()->getFlashdata('usersuccess') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form id="userForm" action="/simpan" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
                <div class="text-danger small" id="usernameError"></div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="text-danger small" id="passwordError"></div>
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim">
                <div class="text-danger small" id="nimError"></div>
            </div>

            <div class="mb-3">
                <label for="full_name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="full_name" name="full_name">
                <div class="text-danger small" id="fullNameError"></div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('user') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</div>

<script>
    document.getElementById("userForm").addEventListener("submit", function(e) {
        let isValid = true;

        // Ambil field
        let username = document.getElementById("username");
        let password = document.getElementById("password");
        let nim = document.getElementById("nim");
        let fullName = document.getElementById("full_name");

        // Reset error
        document.getElementById("usernameError").textContent = "";
        document.getElementById("passwordError").textContent = "";
        document.getElementById("nimError").textContent = "";
        document.getElementById("fullNameError").textContent = "";

        // Reset class
        username.classList.remove("is-invalid");
        password.classList.remove("is-invalid");
        nim.classList.remove("is-invalid");
        fullName.classList.remove("is-invalid");

        // Validasi
        if (username.value.trim() === "") {
            document.getElementById("usernameError").textContent = "Username wajib diisi.";
            username.classList.add("is-invalid");
            isValid = false;
        }
        if (password.value.trim() === "") {
            document.getElementById("passwordError").textContent = "Password wajib diisi.";
            password.classList.add("is-invalid");
            isValid = false;
        }
        if (nim.value.trim() === "") {
            document.getElementById("nimError").textContent = "NIM wajib diisi.";
            nim.classList.add("is-invalid");
            isValid = false;
        }
        if (fullName.value.trim() === "") {
            document.getElementById("fullNameError").textContent = "Nama lengkap wajib diisi.";
            fullName.classList.add("is-invalid");
            isValid = false;
        }

        // Cegah submit jika tidak valid
        if (!isValid) {
            e.preventDefault();
        }
    });
</script>
