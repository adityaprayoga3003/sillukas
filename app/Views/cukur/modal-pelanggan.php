<div class="modal fade" id="modalPelanggan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal-ToggleLabel">DATA Cukur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tabel Customer -->

                <table id="datatablesSimple2">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="45%">Nama Pelanggan</th>
                            <th width="30%">Jumlah Cukur</th>
                            <!-- <th width="15%">Email</th>
                            <th width="15%">Telp</th> -->
                            <th width="45%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dataPelanggan as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['nama_pelanggan'] ?></td>
                                <td><?= $value['jumlah_cukur'] ?></td>

                                <td>
                                    <button onclick="selectPelanggan('<?= $value['id_pelanggan']  ?>','<?= $value['nama_pelanggan']  ?>')" class="btn btn-success"><i class="fa fa-plus"></i> Pilih</button>
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
    function selectPelanggan(id, name) {
        $('#id-pelanggan').val(id);
        $('#nama-pelanggan').val(name);
        $('#modalPelanggan').modal('hide');
    }
</script>