<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">DATA PRODUK</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengelolaan Data Produk</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Form Edit Buku -->
                <form action="/produk/edit/<?= $result['id_produk'] ?>" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="id_produk" value="<?= $result['id_produk']; ?>">
                    <?= csrf_field(); ?>
                    <div class="mb-3 row">
                        <label for="title" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('nama_produk') ? 'is-invalid' : '' ?>" id="nama_produk" name="nama_produk" value="<?= old('nama_produk', $result['nama_produk']) ?>">
                            <div id="validationonServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama_produk'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('stok_produk') ? 'is-invalid' : '' ?>" id="stok_produk" name="stok_produk" value="<?= old('stok_produk', $result['stok_produk']); ?>">
                            <div id="validationonServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('stok_produk'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('harga') ? 'is-invalid' : '' ?>" id="harga" name="harga" value="<?= old('harga', $result['harga']); ?>">
                            <div id="validationonServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('harga'); ?>
                            </div>
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                        <div class="col-sm-5">
                            <input type="hidden" name="coverlama" value="<?= $result['cover'] ?>">
                            <input type="file" class="form-control <?= $validation->hasError('cover') ?
                                                                        'is-invalid' : '' ?>" id="cover" name="cover" value="cover" onchange="previewImage()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('cover') ?>
                            </div>
                            <div class="col-sm-6 mt-2">
                                <img src="/img/<?= $result['cover'] == "" ? "default.jpg" : $result['cover'] ?>" alt="" class="img-thumbnail img-preview">
                            </div>
                        </div>

                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="submit">Perbarui</button>
                        <button class="btn btn-danger" type="reset">Batal</button>
                    </div>
                </form>
                <!-- -->
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>