<?php include 'admin/header.php'; ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Reservasi </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reservasi</li>
                </ol>
            </nav>
        </div>

        <!-- Form Reservasi -->
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Reservasi</h4>
                        <form class="forms-sample" action="<?= base_url('reservasi/tambah') ?>" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required>
                            </div>
                            <div class="form-group">
                                <label for="waktu">Waktu</label>
                                <input type="time" class="form-control" id="waktu" name="waktu" placeholder="Waktu" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_orang">Jumlah Orang</label>
                                <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang" placeholder="Jumlah Orang" required>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="button" class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Reservasi -->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Reservasi</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Nama </th>
                                        <th> Tanggal </th>
                                        <th> Waktu </th>
                                        <th> Jumlah Orang </th>
                                        <th> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reservasi as $r) { ?>
                                        <tr>
                                            <td> <?= $r['nama'] ?> </td>
                                            <td> <?= $r['tanggal'] ?> </td>
                                            <td> <?= $r['waktu'] ?> </td>
                                            <td> <?= $r['jumlah_orang'] ?> </td>
                                            <td>
                                                <a href="<?= base_url('reservasi/edit/' . $r['id']) ?>" class="btn btn-warning">Edit</a>
                                                <a href="<?= base_url('reservasi/delete/' . $r['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php include 'admin/footer.php'; ?>
                        </div>
                    </div>

                </div>
            </div>