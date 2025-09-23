<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Daftar Mata Kuliah</h3>

<div class="mb-3">
    <input type="text" id="searchBox" class="form-control" placeholder="Cari mata kuliah...">
</div>

<table class="table table-bordered table-striped" id="courseTable">
    <thead class="table-dark">
        <tr>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody id="courseBody">
    </tbody>
</table>

<div class="text-center mb-3">
    <a href="/tambahmatakuliah" class="btn btn-success">+ Tambah Mata Kuliah</a>
</div>

<script>
    let courses = <?= json_encode($courses); ?>;

    function renderTable(data) {
        let tbody = document.getElementById("courseBody");
        tbody.innerHTML = "";

        if (data.length === 0) {
            const tr = document.createElement("tr");
            tr.innerHTML = `<td colspan="3" class="text-center">Belum ada data mata kuliah.</td>`;
            tbody.appendChild(tr);
            return;
        }

        data.forEach(c => {
            const tr = document.createElement("tr");

            tr.innerHTML = `
                <td>${c.course_name}</td>
                <td>${c.credits}</td>
                <td class="text-center">
                    <a href="/editmatakuliah/${c.course_id}" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(${c.course_id}, '${c.course_name}', ${c.credits})">Hapus</button>
                </td>
            `;

            tbody.appendChild(tr);
        });
    }

    renderTable(courses);

    document.getElementById("searchBox").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let filtered = courses.filter(c =>
            c.course_name.toLowerCase().includes(filter) ||
            String(c.credits).includes(filter)
        );
        renderTable(filtered);
    });

    function confirmDelete(courseId, courseName, credits) {
        if (confirm(`Yakin hapus mata kuliah ini?\nNama: ${courseName}\nSKS: ${credits}`)) {
            window.location.href = `/courses/delete/${courseId}`;
        }
    }
</script>

<?= $this->endSection() ?>
