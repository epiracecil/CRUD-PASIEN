<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App | Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">My App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link" aria-current="page">Pasien</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>   
        <div class="row mt-3">
            <div class="col-sm">
                <h3>Tambah Data Pasien</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="tambahpasien.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Data</a>
            </div>
        </div>    
        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-hover table-sm">
                    <tr>
                        <th>No</th>
                        <th>ID Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                    include 'koneksi.php';
                    $no = 1;
                    $hasil = $koneksi->query("SELECT * FROM pasien");

                    while ($row = $hasil->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?=$no++; ?></td>
                        <td><?=$row['idPasien']; ?></td>
                        <td><?=$row['nmPasien']; ?></td>
                        <td><?=$row['jk']; ?></td>
                        <td><?=$row['alamat']; ?></td>
                        <td>
                            <a href="editpasien.php?edit=<?= $row['idPasien']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?=$row['idPasien']; ?>">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Yakin Ingin Menghapus Data?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <script>
        let deleteModal = document.getElementById('deleteModal');
        let confirmDeleteButton = document.getElementById('confirmDelete');
        let currentDeleteId;

        deleteModal.addEventListener('show.bs.modal', function (event) {
            let button = event.relatedTarget;
            currentDeleteId = button.getAttribute('data-id');
        });

        confirmDeleteButton.addEventListener('click', function () {
            window.location.href = `koneksi.php?idPasien=${currentDeleteId}`;
        });
    </script>
</body>
</html>
