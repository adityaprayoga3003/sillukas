<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px4">
        <h1 class="mt-4">DATA PELANGGAN</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengelolaan Data Pelanggan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Form Tambah User -->
                <form action="<?= base_url('pelanggan/create') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('nama_pelanggan') ? 'is-invalid'
                                                                        : '' ?>" id="nama_pelanggan" name="nama_pelanggan" value="<?= old('nama_pelanggan') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama_pelanggan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid'
                                                                        : '' ?>" id="alamat" name="alamat" value="<?= old('alamat') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('alamat') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nohp_pelanggan" class="col-sm-2 col-form-label">Nomor HP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('nohp_pelanggan') ? 'is-invalid'
                                                                        : '' ?>" id="nohp_pelanggan" name="nohp_pelanggan" value="<?= old('nohp_pelanggan') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nohp_pelanggan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jumlah_cukur" class="col-sm-2 col-form-label">Jumlah Cukur </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('jumlah_cukur') ? 'is-invalid'
                                                                        : '' ?>" id="nohp_pelanggan" name="jumlah_cukur" value="<?= old('jumlah_cukur') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('jumlah_cukur') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="submit">Simpan</button>
                            <button class="btn btn-danger" type="reset">Batal</button>
                        </div>
                </form>
                <!--  -->
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>