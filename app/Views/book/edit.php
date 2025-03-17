<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">DATA BUKU</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengelolaan Data Buku</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Form Edit Buku -->
                <form action="/book/edit/<?= $result['book_id'] ?>" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="slug" value="<?= $result['slug']; ?>">
                    <?= csrf_field(); ?>
                    <div class="mb-3 row">
                        <label for="title" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('title') ? 'is-invalid' : '' ?>" id="title" name="title" value="<?= old('title', $result['title']) ?>">
                            <div id="validationonServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('title'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="author" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('author') ? 'is-invalid' : '' ?>" id="author" name="author" value="<?= old('author', $result['author']); ?>">
                            <div id="validationonServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('author'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="release_year" class="col-sm-2 col-form-label">Tahun Terbit</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('release_year') ? 'is-invalid' : '' ?>" id="release_year" name="release_year" value="<?= old('release_year', $result['release_year']); ?>">
                            <div id="validationonServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('release_year'); ?>
                            </div>
                        </div>
                        <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control <?= $validation->hasError('stock') ? 'is-invalid' : '' ?>" id="stock" name="stock" value="<?= old('stock', $result['stock']); ?>">
                            <div id="validationonServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('stock'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('price') ? 'is-invalid' : '' ?>" id="price" name="price" value="<?= old('price', $result['price']); ?>">
                            <div id="validationonServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('price'); ?>
                            </div>
                        </div>
                        <label for="discount" class="col-sm-2 col-form-label">Diskon</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control <?= $validation->hasError('discount') ? 'is-invalid' : '' ?>" id="discount" name="discount" value="<?= old('discount', $result['discount']) ?>">
                            <div id="validationonServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('discount'); ?>
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
                        <label for="book_category_id" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-3">
                            <select type="text" class="form-control" name="book_category_id" id="book_category_id">
                                <?php foreach ($category as $value) : ?>
                                    <option value="<?= $value['book_category_id'] ?>" <?= $value['book_category_id'] == $result['book_category_id'] ? 'selected' : '' ?>>
                                        <?= $value['name_category']; ?></option>
                                <?php endforeach; ?>
                            </select>
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