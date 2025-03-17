<div class="modal fade" id="modalCukur" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">DATA CUKUR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tabel Buku -->
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <!-- <th width="20%">Sampul</th> -->
                            <th width="40%">Kategori Cukur</th>
                            <th width="25%">Harga</th>
                            <!-- <th width="15%">Harga</th> -->
                            <!-- <th width="10%">Stock</th> -->
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dataKategori as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>

                                <td><?= $value['nama_kategori'] ?></td>
                                <td><?= $value['harga'] ?></td>


                                <td>
                                    <button onclick="add_cart('<?= $value['id']  ?>',
                                '<?= $value['nama_kategori']  ?> ','<?= $value['harga']  ?>')" class="btn btn-success">
                                        <i class="fa fa-cart-plus"></i> Tambahkan</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!--  -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
    function add_cart(id, name, price) {
        $.ajax({
            url: "<?= base_url('cukur') ?>",
            method: "POST",
            data: {
                id: id,
                name: name,
                qty: 1,
                price: price,

            },
            success: function(data) {
                console.log(data);
                load()
            }
        });
    }

    function update_cart() {
        var rowid = $('#rowid').val();
        var qty = $('#qty').val();

        $.ajax({
            url: "<?= base_url('cukur/update') ?>",
            method: "POST",
            data: {
                rowid: rowid,
                qty: qty,
            },
            success: function(data) {
                load();
                $('#modalUbah').modal('hide');
            }
        });
    }
</script>

<!-- Modal Update Jumlah -->
<div class="modal fade" id="modalUbah" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">UBAH JUMLAH Cukur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-sm-7">
                        <input type="hidden" id="rowid">
                        <input type="number" id="qty" class="form-control" placeholder="Masukkan Jumlah Cukur" min="1" value="1">
                    </div>
                    <div class="col-sm-5">
                        <button class="btn btn-primary" onclick="update_cart()">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>