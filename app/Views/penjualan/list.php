<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"> TRANSAKSI PENJUALAN</h1>
        <o1 class="breadcrumb mb-4">
            <li class="breadvrumb-item active">
                Transaksi Penjualan
            </li>
        </o1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Isi Pos -->
                <div class="row">
                    <div class="col">
                        <label class="col-form-label">Tanggal</label>
                        <input type="text" value=<?= date('d/m/Y') ?> disabled>
                    </div>
                    <div class="col">
                        <label class="col-form-label">User</label>
                        <input type="text" value="<?= session()->username ?>" disabled>
                    </div>
                    <div class="col">
                        <label class="col-form-label">Karyawan</label>
                        <input type="text" id="nama-karyawan" disabled>
                        <input type="hidden" id="id-karyawan">
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary" data-bs-target="#modalProduk" data-bs-toggle="modal">Pilih Produk</button>
                        <button class="btn btn-dark" data-bs-target="#modalKaryawan" data-bs-toggle="modal">Cari Karyawan</button>
                    </div>
                </div>
                <table class="table table-striped table-hover mt-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga Satuan</th>
                            <th>Harga Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="detail_cart">
                    </tbody>
                </table>
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <label class="col-form-label">Total Bayar</label>
                            <h1><span id="spanTotal">0</span></h1>
                        </div>
                        <div class="col-4">
                            <div class="mb-3 row">
                                <label class="col-4 col-form-label">Nominal</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="nominal" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-4 col-form-label">Kembalian</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="kembalian" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-gird gap-3 d-md-flex justify-content-md-end">

                        <button onclick="bayar()" class="btn btn-success me-md-2" type="button">Proses Bayar</button>
                        <button onclick="location.reload()" class="btn btn-primary" type="button">Transaksi Baru</button>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>

</main>
<?= $this->include('penjualan/modal-produk') ?>
<?= $this->include('penjualan/modal-karyawan') ?>
<script>
    function load() {
        $('#detail_cart').load("<?= base_url('penjualan/load') ?>");
        $('#spanTotal').load("<?= base_url('penjualan/gettotal') ?>");

    }

    $(document).ready(function() {
        load();
    });

    // Ubah Jumlah Item
    $(document).on('click', '.ubah_cart', function() {
        var row_id = $(this).attr("id");
        var qty = $(this).attr("qty");
        $('#rowid').val(row_id);
        $('#qty').val(qty);
        $('#modalUbah').modal('show');
    });

    // Hapus Item cart
    $(document).on('click', '.hapus_cart', function() {
        var row_id = $(this).attr("id");
        $.ajax({
            url: "<?= base_url('penjualan') ?>/" + row_id,
            method: "DELETE",
            success: function(data) {
                load();
            }
        });
    });

    function bayar() {
        var nominal = $('#nominal').val();
        var idkaryawan = $('#id-karyawan').val();
        // console.log(nominal, idkaryawan);
        $.ajax({
            url: "<?= base_url('penjualan/bayar') ?>",
            method: "POST",
            data: {
                'nominal': nominal,
                'id-karyawan': idkaryawan
            },
            success: function(response) {
                var result = JSON.parse(response);
                // console.log(result.data.kembalian);
                swal({
                    title: result.msg,
                    icon: result.status ? "success" : "warning",
                });
                load();
                $('#nominal').val("");
                $('#kembalian').val(result.data.kembalian);
            }
        });
    }
</script>
<?= $this->endSection() ?>