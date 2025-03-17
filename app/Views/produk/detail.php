<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <div class="container-fluid px4">
        <h1 class="mt-4">DATA PRODUK</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                Pengelolaan Data Produk
            </li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
                List Data Produk
            </div>
            <div class="card-body">
                <!-- isi Detail -->
                <div class="card mb-3">
                    <div class="row g-0">
                    <div class="col-md-4">
                            <img src="<?= base_url('img/' . $result['cover']) ?>" alt="" width="100%">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $result['nama_produk'] ?></h5>
                                <p class="card-text">Stok:<br><?= $result['stok_produk'] ?></p>
                                <p class="card-text">Harga:<br><?= $result['harga'] ?></p>

                                <div class="d-grid gap-2 d-md-block">
                                    <a class="btn btn-dark" type="button" href="<?= base_url('produk') ?>">Kembali</a>
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