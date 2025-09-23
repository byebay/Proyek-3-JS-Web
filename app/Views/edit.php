<link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
            <h2 class="mb-4">Edit User</h2>

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

            <form id="editUserForm" action="/update/<?= $user['user_id'] ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['username']) ?>">
                    <div class="text-danger small" id="usernameError"></div>
                </div>

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= esc($user['nim'] ?? '') ?>">
                    <div class="text-danger small" id="nimError"></div>
                </div>

                <div class="mb-3">
                    <label for="full_name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?= esc($user['full_name']) ?>">
                    <div class="text-danger small" id="fullNameError"></div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password (kosongkan jika tidak ingin diubah)</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="text-danger small" id="passwordError"></div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/user" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("editUserForm").addEventListener("submit", function(e) {
        let isValid = true;

        // Ambil field
        let username = document.getElementById("username");
        let nim = document.getElementById("nim");
        let fullName = document.getElementById("full_name");
        let password = document.getElementById("password");

        // Reset error
        document.getElementById("usernameError").textContent = "";
        document.getElementById("nimError").textContent = "";
        document.getElementById("fullNameError").textContent = "";
        document.getElementById("passwordError").textContent = "";

        // Validasi
        if (username.value.trim() === "") {
            document.getElementById("usernameError").textContent = "Username wajib diisi.";
            isValid = false;
        }
        if (nim.value.trim() === "") {
            document.getElementById("nimError").textContent = "NIM wajib diisi.";
            isValid = false;
        }
        if (fullName.value.trim() === "") {
            document.getElementById("fullNameError").textContent = "Nama lengkap wajib diisi.";
            isValid = false;
        }
        // Password boleh kosong, hanya validasi jika diisi
        if (password.value.trim() !== "" && password.value.length < 4) {
            document.getElementById("passwordError").textContent = "Password minimal 4 karakter.";
            isValid = false;
        }

        // Cegah submit jika tidak valid
        if (!isValid) {
            e.preventDefault();
        }
    });
</script>
