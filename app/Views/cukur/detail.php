<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <div class="container-fluid px4">
        <h1 class="mt-4">DATA cukur</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                Pengelolaan Data Cukur
            </li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-3"></i>
                <?= $title ?>
                List Data Cukur
            </div>
            <div class="card-body">
                <!-- isi Detail -->
                <div class="card mb-3">
                    <div class="row g-0">

                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $result['id_transaksicukur'] ?></h5>
                                <p class="card-text">Nama Karyawan:<br><?= $result['nama_karyawan'] ?></p>
                                <p class="card-text">Jumlah:<br><?= $result['jumlah'] ?></p>
                                <p class="card-text">Harga Satuan:<br><?= $result['harga'] ?></p>
                                <p class="card-text">Harga Total:<br><?= $result['total_harga'] ?></p>


                                <div class="d-grid gap-2 d-md-block">
                                    <a class="btn btn-dark" type="button" href="<?= base_url('cukur') ?>">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -->
            </div>
        </div>
    </div>
</main>
<?= $this->endsection() ?>