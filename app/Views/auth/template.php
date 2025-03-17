<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .custom-text-container {
            position: relative;
            display: inline-block;
            padding: 10px;
            z-index: 1;
        }

        .custom-text span {
            font-size: 32px;
            font-family: Geneva, sans-serif;
            font-weight: 700;
            word-wrap: break-word;
            background: linear-gradient(to black, rgba(255, 255, 255, 0.7), rgba(240, 240, 240, 0.7));
            /* Gradien putih transparan */
            -webkit-background-clip: text;
            color: darkblue;
            display: inline-block;
            animation: float 2s infinite;
            animation-delay: calc(var(--animation-order) * 0.2s);
        }
    </style>

    <style>
        @keyframes borderAnimation {
            0% {
                background-position: 0% 0;
            }

            100% {
                background-position: 100% 0;
            }
        }

        .card {
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: linear-gradient(90deg, #c4bebe, #635454);
            background-size: 200% 100%;
            animation: borderAnimation 2s infinite linear;
        }

        .card-header,
        .card-footer {
            position: relative;
            z-index: 1;
            background: white;
            /* Background color to cover the gradient border */
        }
    </style>

    <title>Login - SB Admin</title>
    <link href="<?= base_url() ?>/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="card-body" style="background-image: url('<?= base_url('img/logo.jpg'); ?>'); 
        background-size: cover; background-repeat: no-repeat;"> <!-- Change the background to white -->
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <!-- Start Body atau Content -->
            <?= $this->renderSection('content') ?>
            <!-- End Body atau Content -->
        </div>
        <div id="layoutAuthentication_footer">
            <footer id="footer" class="py-4 mt-auto" style="background-color: rgba(255, 255, 255, 0.8);">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>