<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion" style="background-color: black(255, 255, 255, 0.8);" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading"></div>
                    <a class="nav-link" href="<?= base_url() ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: black;"></i></div>
                        <span style="color: black;">Dashboard</span>
                    </a>
                    <a class="nav-link" href="/grafik">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-pie    " style="color: black;"></i></div>
                        <span style="color: black;">Grafik</span>
                    </a>
                    <div class="sb-sidenav-menu-heading">TRANSAKSI</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart" style="color: black;"></i></div>
                        <span style="color: black;">Transaksi</span>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color: black;"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" style="color: black;" href="<?= base_url('penjualan') ?>">Transaksi Penjualan</a>
                            <a class="nav-link" style="color: black;" href="<?= base_url('pembelian') ?>">Transaksi Pembelian</a>
                            <a class="nav-link" style="color: black;" href="<?= base_url('cukur') ?>">Transaksi Cukur</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">

                        <div class="sb-nav-link-icon"><i class="fas fa-file-alt" style="color: black;"></i></div>
                        <span style="color: black;">Laporan</span>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color: black;"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                            <a class="nav-link" style="color: black;" href="/penjualan/laporan">Laporan Penjualan</a>
                            <a class="nav-link" style="color: black;" href="/pembelian/laporan">Laporan Pembelian</a>
                            <a class="nav-link" style="color: black;" href="/cukur/laporan">Laporan Cukur</a>

                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">MASTER</div>
                    <?php if (session()->role == "owner" || session()->role == "karyawan") : ?>
                        <a class="nav-link collapsed" href="<?= base_url('produk') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-box fa-fw" style="color: black;"></i></div>
                            <span style="color: black;">Data Produk</span>
                        </a>
                        <a class="nav-link" href="/pelanggan">
                            <div class="sb-nav-link-icon"><i class="fas fa-users fa-fw" style="color: black;"></i></div>
                            <span style="color: black;">Data Pelanggan</span>
                        </a>
                        <a class="nav-link" href="/kategori">
                            <div class="sb-nav-link-icon"><i class="fas fa-folder" style="color: black;"></i></div>
                            <span style="color: black;">Data Kategori Cukur</span>
                        </a>
                    <?php endif; ?>

                    <?php if (session()->role == "owner") : ?>
                        <a class="nav-link" href="/pengguna">
                            <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw" style="color: black;"></i></div>
                            <span style="color: black;">Data Pengguna</span>
                        </a>
                        <a class="nav-link" href="/karyawan">
                            <div class="sb-nav-link-icon"><i class="fas fa-hard-hat" style="color: black;"></i></div>
                            <span style="color: black;">Data Karyawan</span>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Doa Ibu</div>
                Aditya Prayoga &
                Rio Andika
            </div>
        </nav>
    </div>