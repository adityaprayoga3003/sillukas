<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px4">
        <h1 class="mt-4">LAPORAN PEMBELIAN</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                Laporan Pembelian
            </li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }

                    th,
                    td {
                        border: 1px solid gray;
                        padding: 8px;
                        text-align: center;
                        /* Center-align text in table cells */
                    }
                </style>
                <!-- Filter -->
                <form action="/pembelian/laporan/filter" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <input type="date" class="form-control" name="tgl_awal" value="<?= $tanggal['tgl_awal'] ?>" title="Tanggal Awal">
                            </div>
                            <div class="col-4">
                                <input type="date" class="form-control" name="tgl_akhir" value="<?= $tanggal['tgl_akhir'] ?>" title="Tanggal Akhir">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <!-- isi Report -->
                <a target="_blank" class="btn btn-danger mb-3" type="button" href="/pembelian/exportpdf"><i class="fas fa-file-pdf"></i></a>
                <a class="btn btn-success mb-3" type="button" href="/pembelian/exportexcel"><i class="fas fa-file-excel"></i></a>
                <table id="datatablesSimple" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nota</th>
                            <th>Tanggal Transaksi</th>
                            <th>User</th>
                            <th>Karyawan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($result as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['id_pembelian'] ?></td>
                                <td><?= date("d/m/Y H:i:s", strtotime($value['tgl_transaksi'])) ?></td>
                                <td><?= $value['nama'] ?> </td>
                                <td><?= $value['nama_karyawan'] ?></td>
                                <td><?= number_to_currency($value['total'], 'IDR', 'id_ID', 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- </br> -->
                <!--  -->
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>