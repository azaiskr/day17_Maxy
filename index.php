<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rumah Sakit</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
      <a class="navbar-brand" href="#">
        <img src="assets\medical_logo.png" alt="Logo" width="75" />
      </a>
    </nav>
    

    <div id="content" class="container">

        <div class="pageTitle">
            <span>Daftar Pasien</span>
        </div>

        <div class="row" >
            <a class="btnAdd" href="/buku/tambah" role="button"> 
                <i class="bi bi-plus-lg"></i>
                <span class="btnLabel">Tambah pasien</span>
            </a>

            <div class="tableContainer" >
                <table class="table-div">
                    <thead class="thead-primary">
                        <tr>
                            <th class="text-center" >ID Pasien</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal lahir</th>
                            <th>Jenis kelamin</th>
                            <th class="text-center">No. Telepon</th>
                            <th> </th>
                    </thead>
                    <tbody>
                        <?php
                            include 'utils/connection.php';
                            $no = 1;
                            $data = mysqli_query($connection, "select * from pasien");
                            while($d = mysqli_fetch_array($data)){ ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++?></td>
                                    <td class="text-left"><?php echo $d['nama']?></td>
                                    <td class="text-left"><?php echo $d['alamat']?></td>
                                    <td class="text-center"><?php echo $d['tanggalLahir']?></td>
                                    <td class="text-center"><?php echo $d['jenisKelamin']?></td>
                                    <td class="text-center"><?php echo $d['noTelepon']?></td>
                                    <td>
                                        <a class="btnEdit" 
                                            href="#" 
                                            data-id="<?php echo $d['idPasien']; ?>"
                                            data-nama="<?php echo $d['nama']; ?>"
                                            data-alamat="<?php echo $d['alamat']; ?>"
                                            data-tanggallahir="<?php echo $d['tanggalLahir']; ?>"
                                            data-jeniskelamin="<?php echo $d['jenisKelamin']; ?>"
                                            data-notelepon="<?php echo $d['noTelepon']; ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a class="btnRemove" href="hapus.php?id=<?php echo $d['idPasien']?>"> 
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>   
                                </tr>
                                <?php 
                            } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for Adding Data -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            <h3 style="text-align: center">Tambah Pasien</h3>
            <form action="utils/action_add.php" method="post">
                <div class="form">
                    <label for="nama"><h5> Nama </h5></label>
                    <input class="form-control" type="text" id="addNama" name="nama" required>
                </div>
                <div class="form">
                    <label for="nama"><h5> Alamat </h5></label>
                    <input class="form-control" type="text" id="addAlamat" name="alamat" required>
                </div>
                <div class="form">
                    <label for="tanggalLahir"><h5> Tanggal lahir </h5></label>
                    <input class="form-control" type="date" id="addTanggalLahir" name="tanggalLahir" required>
                </div>
                <div class="form">
                    <label for="jenisKelamin"><h5> Jenis kelamin </h5></label>
                    <select id="addJenisKelamin" name="jenisKelamin" required>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
                <div class="form">
                    <label for="noTelepon"><h5> No telepon </h5></label>
                    <input class="form-control" type="text" id="addNoTelepon" name="noTelepon" required>
                </div>
                <div class="form-group float-right">
                        <button class="btn-success" type="sumbit"> Tambah </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal for Editing Data -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            <h3 style="text-align: center">Edit Pasien</h3>
            <form action="utils/action_update.php" method="post">
                <input type="hidden" id="editId" name="idPasien">
                <div class="form">
                    <label for="nama"><h5> Nama </h5></label>
                    <input class="form-control" type="text" id="editNama" name="nama" required>
                </div>
                <div class="form">
                    <label for="alamat"><h5> Alamat </h5></label>
                    <input class="form-control" type="text" id="editAlamat" name="alamat" required>
                </div>
                <div class="form">
                    <label for="tanggalLahir"><h5> Tanggal lahir </h5></label>
                    <input class="form-control" type="date" id="editTanggalLahir" name="tanggalLahir" required>
                </div>
                <div class="form">
                    <label for="jenisKelamin"><h5> Jenis kelamin </h5></label>
                    <select id="editJenisKelamin" name="jenisKelamin" required>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
                <div class="form">
                    <label for="noTelepon"><h5> No telepon </h5></label>
                    <input class="form-control" type="text" id="editNoTelepon" name="noTelepon" required>
                </div>
                <div class="form-group float-right">
                    <button class="btn-success" type="submit"> Simpan </button>
                </div>
            </form>
        </div>
    </div>




    <footer class="footer text-white text-center">
        <br>
      <p>&copy; 2024 N Azis Kurnia R. All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="const/provinces.js"></script>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin="">    
    </script>
  </body>
</html>
