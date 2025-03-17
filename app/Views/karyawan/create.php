<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px4">
        <h1 class="mt-4">DATA USER</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengelolaan Data User</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Form Tambah User -->
                <form action="<?= base_url('karyawan/create') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('nama_karyawan') ? 'is-invalid'
                                                                        : '' ?>" id="nama_karyawan" name="nama_karyawan" value="<?= old('nama_karyawan') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama_karyawan') ?>
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
                        <label for="nohp_karyawan" class="col-sm-2 col-form-label">Nomor HP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('nohp_karyawan') ? 'is-invalid'
                                                                        : '' ?>" id="nohp_karyawan" name="nohp_karyawan" value="<?= old('nohp_karyawan') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nohp_karyawan') ?>
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