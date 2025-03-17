<html>

<head>
    <!-- Berisi CSS -->
    <style>
        .title {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .border-table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            font-size: 12px;
        }

        .border-table th {
            border: 1px solid #000;
            background-color: #e1e3e9;
            font-weight: bold;
        }

        .border-table td {
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <main>
        <div class="title">
            <h1>LAPORAN CUKUR</h1>
        </div>
        <div>
            <!-- isi laporan -->
            <table class="border-table">
                <thead>
                    <tr>
                        <th width="4%">No</th>
                        <th width="16%">Nota</th>
                        <th width="25%">Tanggal Transaksi</th>
                        <th width="13%">Pelanggan</th>
                        <th width="13%">Jenis Cukur</th>
                        <th width="13%">Karyawan</th>
                        <th width="16%">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0;
                    $no = 1;
                    foreach ($result as $value) : ?>
                        <tr>
                            <td width="4%"><?= $no++ ?></td>
                            <td width="16%"><?= $value['id_transaksicukur'] ?></td>
                            <td width="25%">
                                <?= date("d/m/Y H:i:s", strtotime($value['tgl_transaksi'])) ?></td>
                            <td width="13%"><?= $value['nama_pelanggan'] ?></td>
                            <td width="13%"><?= $value['nama_kategori'] ?></td>
                            <td width="13%"><?= $value['nama_karyawan'] ?></td>
                            <td width="16%">
                                <?= number_to_currency($value['total'], 'IDR', 'id_ID', 2) ?>
                            </td>
                        </tr>
                    <?php $total += $value['total'];
                    endforeach;  ?>
                    <tr>
                        <th width="84%">Total</th>
                        <th width="16%"><?= number_to_currency($total, 'IDR', 'id_ID', 2) ?></th>
                    </tr>
                </tbody>
            </table>
            <!--  -->

        </div>
    </main>
</body>

</html>