<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <div class="container-fluid px4">
        <h1 class="mt-4">DATA Karyawan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                Pengelolaan Data Karyawan
            </li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
                List Data Karyawan
            </div>
            <div class="card-body">
                <!-- isi Detail -->
                <div class="card mb-3">
                    <div class="row g-0">

                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $result['nama_karyawan'] ?></h5>
                                <p class="card-text">Alamat:<br><?= $result['alamat'] ?></p>
                                <p class="card-text">No Hp:<br><?= $result['nohp_karyawan'] ?></p>
                                
                                <div class="d-grid gap-2 d-md-block">
                                    <a class="btn btn-dark" type="button" href="<?= base_url('karyawan') ?>">Kembali</a>
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