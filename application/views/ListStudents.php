<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/bootstrap.min.css">

    <title>Students Data</title>
</head>

<body>
    <!-- As a heading -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Students Data by Rakha</span>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-7">
                <h3>Data Mahasiswa</h3>
                <?= $this->session->flashdata('success'); ?>
                <a href="<?= base_url('students/create/'); ?>" class="btn btn-dark mb-2">Tambah Data</a>
                <div class="table-responsive table-striped">
                    <table class="table">
                        <thead>
                            <?php $no = 1; ?>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Fakultas</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            /** @var array $murid */
                            foreach ($murid as $m) : ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $m['nama']; ?></td>
                                    <td><?= $m['nim']; ?></td>
                                    <td><?= $m['fakultas']; ?></td>
                                    <td><?= $m['alamat']; ?></td>
                                    <td><a href="<?= base_url('students/delete/'); ?><?= $m['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah kamu ingin menghapus data ini?');">Hapus</a>
                                    </td>
                                    <td><a href="<?= base_url('students/update/'); ?><?= $m['id']; ?>" class="badge badge-warning">Ubah</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
</body>

</html>