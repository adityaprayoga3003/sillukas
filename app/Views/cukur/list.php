<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"> TRANSAKSI CUKUR</h1>
        <o1 class="breadcrumb mb-4">
            <li class="breadvrumb-item active">
                Transaksi Cukur
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
                        <input type="text" class="form-control" value="<?= date('d/m/Y') ?>" disabled>
                    </div>
                    <div class="col">
                        <label class="col-form-label">User</label>
                        <input type="text" class="form-control" value="<?= session()->username ?>" disabled>
                    </div>
                    <div class="col">
                        <label class="col-form-label">Karyawan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nama-karyawan" disabled>
                            <input type="hidden" id="id-karyawan">
                        </div>
                    </div>
                    <div class="col">
                        <label class="col-form-label">Pelanggan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nama-pelanggan" disabled>
                            <input type="hidden" id="id-pelanggan">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="btn-group">
                            <button class="btn btn-warning" data-bs-target="#modalPelanggan" data-bs-toggle="modal">Pilih Pelanggan</button>
                            <button class="btn btn-primary" data-bs-target="#modalCukur" data-bs-toggle="modal">Pilih Cukur</button>
                            <button class="btn btn-dark" data-bs-target="#modalKaryawan" data-bs-toggle="modal">Cari Karyawan</button>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-hover mt-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Cukur</th>
                            <th>Jumlah Cukur</th>

                            <th>Harga Cukur</th>
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
                                <label class="col-4 col-form-label">Diskon</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="diskon" autocomplete="off" onchange="totalharga()">
                                </div>
                            </div>
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
<?= $this->include('cukur/modal-cukur') ?>
<?= $this->include('cukur/modal-pelanggan') ?>
<?= $this->include('cukur/modal-karyawan') ?>
<script>
    function load() {
        $('#detail_cart').load("<?= base_url('cukur/load') ?>");

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
            url: "<?= base_url('cukur') ?>/" + row_id,
            method: "DELETE",
            success: function(data) {
                load();
            }
        });
    });

    function bayar() {
        var nominal = $('#nominal').val();
        var idkaryawan = $('#id-karyawan').val();
        var idpelanggan = $('#id-pelanggan').val();
        var diskon = $('#diskon').val();
        $.ajax({
            url: "<?= base_url('cukur/bayar') ?>",
            method: "POST",
            data: {
                'nominal': nominal,
                'id-karyawan': idkaryawan,
                'id-pelanggan': idpelanggan,
                'diskon': diskon,
            },
            success: function(response) {
                var result = JSON.parse(response);
                swal({
                    title: result.msg,
                    icon: result.status ? "success" : "warning",
                });
                load();
                $('#nominal').val("");
                $('#kembalian').val(result.data.kembalian);
                $('#spanTotal').text(0);
                $('#diskon').val("");
            }
        });

    }

    function totalharga() {
        var diskon = $('#diskon').val();
        $.ajax({
            url: "<?= base_url('cukur/gettotal') ?>",
            method: "GET",
            data: {
                'diskon': diskon,
            },
            success: function(response) {
                var result = JSON.parse(response);
                console.log(result.total);
                $('#spanTotal').text(result.total);
            }
        });
    }
</script>
<?= $this->endSection() ?>