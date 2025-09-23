document.addEventListener("DOMContentLoaded", function() {
    let mahasiswa = [
        { user_id: 100, nim: "241511002", full_name: "Arief F-sa", role: "mahasiswa" },
        { user_id: 101, nim: "241511003", full_name: "Arnold Billy", role: "mahasiswa" }
    ];

    let table = document.getElementById("tableMahasiswa");

    mahasiswa.forEach(m => {
        let row = `<tr>
            <td>${m.nim}</td>
            <td>${m.full_name}</td>
            <td>${m.role}</td>
        </tr>`;
        table.innerHTML += row;
    });
});
