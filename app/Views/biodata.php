<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Daftar Mahasiswa</h3>

<div class="mb-3">
    <input type="text" id="searchBox" class="form-control" placeholder="Cari mahasiswa...">
</div>

<table class="table table-bordered table-striped" id="userTable">
    <thead class="table-dark">
        <tr>
            <th>NIM</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Role</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody id="userBody">
    </tbody>
</table>

<div class="text-center mb-3">
    <a href="/tambah" class="btn btn-success">+ Tambah Mahasiswa</a>
</div>

<script>
    let users = <?= json_encode($users); ?>;

    function renderUsers(data) {
        let tbody = document.getElementById("userBody");
        tbody.innerHTML = "";

        if (data.length === 0) {
            let tr = document.createElement("tr");
            let td = document.createElement("td");
            td.colSpan = 5;
            td.className = "text-center";
            td.textContent = "Belum ada data mahasiswa.";
            tr.appendChild(td);
            tbody.appendChild(tr);
            return;
        }

        data.forEach(u => {
            let tr = document.createElement("tr");

            let tdNim = document.createElement("td");
            tdNim.textContent = u.nim ?? "-";
            tr.appendChild(tdNim);

            let tdNama = document.createElement("td");
            tdNama.textContent = u.full_name;
            tr.appendChild(tdNama);

            let tdUser = document.createElement("td");
            tdUser.textContent = u.username;
            tr.appendChild(tdUser);

            let tdRole = document.createElement("td");
            tdRole.textContent = u.role;
            tr.appendChild(tdRole);

            let tdAksi = document.createElement("td");
            tdAksi.className = "text-center";
            tdAksi.innerHTML = `
                <a href="/detail/${u.user_id}" class="btn btn-info btn-sm">Detail</a>
                <a href="/edit/${u.user_id}" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" 
                    onclick="confirmDelete('${u.user_id}', '${u.full_name}', '${u.nim}')">Hapus</button>
            `;
            tr.appendChild(tdAksi);

            tbody.appendChild(tr);
        });
    }

    renderUsers(users);

    document.getElementById("searchBox").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let filtered = users.filter(u =>
            (u.full_name ?? '').toLowerCase().includes(filter) ||
            (u.username ?? '').toLowerCase().includes(filter) ||
            (u.nim ?? '').toLowerCase().includes(filter) ||
            (u.role ?? '').toLowerCase().includes(filter)
        );
        renderUsers(filtered);
    });

    function confirmDelete(userId, fullName, nim) {
        if (confirm(`Yakin hapus mahasiswa ini?\nNama: ${fullName}\nNIM: ${nim}`)) {
            window.location.href = `/usercontroller/delete/${userId}`;
        }
    }
</script>

<?= $this->endSection() ?>
