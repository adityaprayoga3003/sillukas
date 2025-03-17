<nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: balck(255, 255, 255, 0.8);">


    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3">
        <!-- <i class="fas fa-user fa-fw"></i> <span style="font-size: 15px;">SILUKAS BARBERSHOP</span> -->
        <img src="<?= base_url('img/logo.jpg'); ?>" style="width: 50px; height: 50px; border-radius: 50%;">
        <span style="font-size: 15px;">SILUKAS BARBERSHOP</span>
            <body class="sb-nav-fixed">

                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    </a>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <a class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" style="color: #888; text-decoration: none;">
        <?php echo session()->get('role'); ?>
    </a>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw "> </i><?php echo session()->get('user_name'); ?></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>