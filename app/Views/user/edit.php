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
                <form action="<?= base_url('users/edit/' . $result['id']) ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Depan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="firstname" value="<?= $result['firstname'] ?>">
                        </div>
                        <label for="name" class="col-sm-2 col-form-label">Nama Belakang</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lastname" value="<?= $result['lastname'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="username" value="<?= $result['user_name'] ?>">
                        </div>
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="email" value="<?= $result['user_email'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="role">
                                <option value="Karyawan" <?= $result['role'] == 'Karyawan' ? 'selected' : '' ?>>Karyawan</option>
                                <option value="Manajer" <?= $result['role'] == 'Manajer' ? 'selected' : '' ?>>Manajer</option>
                                <option value="admin" <?= $result['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="Owner" <?= $result['role'] == 'Owner' ? 'selected' : '' ?>>Owner</option>
                            </select>
                        </div>
                    </div>
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