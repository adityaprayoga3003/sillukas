<div class="modal fade" id="modalKaryawan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal-ToggleLabel">DATA Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tabel Customer -->

                <table id="datatablesSimple2">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="45%">Nama</th>
                            <!-- <th width="30%">No Customer</th> -->
                            <!-- <th width="15%">Email</th>
                            <th width="15%">Telp</th> -->
                            <th width="45%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dataKaryawan as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['nama_karyawan'] ?></td>

                                <td>
                                    <button onclick="selectKaryawan('<?= $value['id_karyawan']  ?>','<?= $value['nama_karyawan']  ?>')" class="btn btn-success"><i class="fa fa-plus"></i> Pilih</button>
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
    function selectKaryawan(id, name) {
        console.log(id, name);
        $('#id-karyawan').val(id);
        $('#nama-karyawan').val(name);
        $('#modalKaryawan').modal('hide');
    }
</script>