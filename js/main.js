document.addEventListener("DOMContentLoaded", function () {
    // "Add" operation
    const addButton = document.querySelector(".btnAdd");
    const addModal = document.getElementById("addModal");
    addButton.addEventListener("click", function (e) {
        e.preventDefault();
        addModal.style.display = "block";
    });

    // "Edit" operation
    const editButtons = document.querySelectorAll(".btnEdit");
    const editModal = document.getElementById("editModal");
    
    editButtons.forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            editModal.style.display = "block";

            const id = this.getAttribute("data-id");
            const nama = this.getAttribute("data-nama");
            const alamat = this.getAttribute("data-alamat");
            const tanggalLahir = this.getAttribute("data-tanggallahir");
            const jenisKelamin = this.getAttribute("data-jeniskelamin");
            const noTelepon = this.getAttribute("data-notelepon");
    
            document.getElementById("editId").value = id;
            document.getElementById("editNama").value = nama;
            document.getElementById("editAlamat").value = alamat;
            document.getElementById("editTanggalLahir").value = tanggalLahir;
            const selectJenisKelamin = document.getElementById("editJenisKelamin");
            selectJenisKelamin.value = jenisKelamin;
            document.getElementById("editNoTelepon").value = noTelepon;
    
            
        });
    });

    //"Remove" operation
    const removeButtons = document.querySelectorAll(".btnRemove");

    removeButtons.forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            const id = this.getAttribute("href").split("=")[1];
    
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = `utils/action_delete.php?id=${id}`;
            }
        });
    });

    // Close modals
    document.querySelectorAll(".modal-close").forEach(button => {
        button.addEventListener("click", function () {
            this.closest(".modal").style.display = "none";
        });
    });
});
