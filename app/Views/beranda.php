<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Raleway", sans-serif;
    }

    .flex-container {
        position: absolute;
        height: 50vh;
        width: 100%;
        display: -webkit-flex;
        /* Safari */
        display: flex;
        overflow: hidden;
    }

    .new-flex-container {
        position: absolute;
        top: 303px;
        left: 24px;
        height: 50vh;
        width: 100%;
        display: -webkit-flex;
        /* Safari */
        display: flex;
        overflow: hidden;
    }

    @media screen and (max-width: 768px) {
        .flex-container {
            flex-direction: column;
        }
    }

    .flex-title {
        color: #f1f1f1;
        position: relative;
        font-size: 6vw;
        margin: auto;
        text-align: center;
        transform: rotate(90deg);
        top: 15%;
        -webkit-transition: all 500ms ease;
        -moz-transition: all 500ms ease;
        -ms-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;
    }

    @media screen and (max-width: 768px) {
        .flex-title {
            transform: rotate(0deg) !important;
        }
    }

    .flex-about {
        opacity: 0;
        color: #f1f1f1;
        position: relative;
        width: 70%;
        font-size: 2vw;
        padding: 5%;
        top: 20%;
        border: 2px solid #f1f1f1;
        border-radius: 10px;
        line-height: 1.3;
        margin: auto;
        text-align: left;
        transform: rotate(0deg);
        -webkit-transition: all 500ms ease;
        -moz-transition: all 500ms ease;
        -ms-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;
    }

    @media screen and (max-width: 768px) {
        .flex-about {
            padding: 0%;
            border: 0px solid #f1f1f1;
        }
    }

    .flex-slide {
        -webkit-flex: 1;
        /* Safari 6.1+ */
        -ms-flex: 1;
        /* IE 10 */
        flex: 1;
        cursor: pointer;
        -webkit-transition: all 500ms ease;
        -moz-transition: all 500ms ease;
        -ms-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;
    }

    @media screen and (max-width: 768px) {
        .flex-slide {
            overflow: auto;
            overflow-x: hidden;
        }
    }

    @media screen and (max-width: 768px) {
        .flex-slide p {
            font-size: 2em;
        }
    }

    @media screen and (max-width: 768px) {
        .flex-slide ul li {
            font-size: 2em;
        }
    }

    .flex-slide:hover {
        -webkit-flex-grow: 3;
        flex-grow: 3;
    }

    .home {
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://i.pinimg.com/474x/e9/4c/8f/e94c8f7798af163f64be2c290a59f72b.jpg);
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }

    @media screen and (min-width: 768px) {
        .home {
            animation: aboutFlexSlide 3s 1;
            animation-delay: 0s;
        }
    }

    @keyframes aboutFlexSlide {
        0% {
            -webkit-flex-grow: 1;
            flex-grow: 1;
        }

        50% {
            -webkit-flex-grow: 3;
            flex-grow: 3;
        }

        100% {
            -webkit-flex-grow: 1;
            flex-grow: 1;
        }
    }

    @media screen and (min-width: 768px) {
        .flex-title-home {
            transform: rotate(90deg);
            top: 15%;
            animation: aboutFlexSlide 3s 1;
            animation-delay: 0s;
        }
    }

    @keyframes homeFlextitle {
        0% {
            transform: rotate(90deg);
            top: 15%;
        }

        50% {
            transform: rotate(0deg);
            top: 15%;
        }

        100% {
            transform: rotate(90deg);
            top: 15%;
        }
    }

    .flex-about-home {
        opacity: 0;
    }

    @media screen and (min-width: 768px) {
        .flex-about-home {
            animation: aboutFlexSlide 3s 1;
            animation-delay: 0s;
        }
    }

    @keyframes flexAboutHome {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    .about {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://i.pinimg.com/474x/7d/bb/7e/7dbb7ee94962d8c9f523b776c5aff441.jpg);
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }

    .contact-form {
        width: 100%;
    }

    input {
        width: 100%;
    }

    textarea {
        width: 100%;
    }

    .contact {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://i.pinimg.com/474x/46/c9/30/46c930183d2f1a75e7c290548c79fcae.jpg);
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }

    .work {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://i.pinimg.com/474x/23/72/7e/23727e5c17754feb7e2f5b75ce8b12ab.jpg);
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }

    .mt-4 {
        text-align: center;
        color: #f1f1f1;
        /* Warna teks hitam */
        margin-top: 1;
        margin-bottom: 0;
    }
    .cukur {
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://i.pinimg.com/474x/64/32/be/6432be25f1fc7d96619b0f352a3108bf.jpg);
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }
    .pembelian {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://i.pinimg.com/474x/15/11/96/1511963a1d7e3f643d41f81468fb537b.jpg);
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }
    .penjualan {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://i.pinimg.com/474x/46/c9/30/46c930183d2f1a75e7c290548c79fcae.jpg);
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }

    .grafik {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://i.pinimg.com/474x/7b/33/c8/7b33c8d721b6b79171dee87c151f53cf.jpg);
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }
</style>


<body>
    <!-- partial:index.partial.html -->
    <div class="container-fluid px-4">
        <div class="flex-container">
            <div class="flex-slide home">
                <div class="flex-title flex-title-home">
                    <a class="nav-link" href="/produk" style="color:white; font-size: 40px;"> Produk</a>
                </div>
                <div class="flex-about flex-about-home"></div>
            </div>
            <div class="flex-slide about">
                <div class="flex-title flex-title-home">
                    <a class="nav-link" href="/pelanggan" style="color:white; font-size: 40px;"> Pelanggan</a>
                </div>
                <div class="flex-about flex-about-home"></div>
            </div>
            <div class="flex-slide work">
                <div class="flex-title flex-title-home">
                    <a class="nav-link" href="/pengguna" style="color:white; font-size: 40px;"> Pengguna</a>
                </div>
                <div class="flex-about flex-about-home"></div>
            </div>
            <div class="flex-slide contact">
                <div class="flex-title flex-title-home">
                    <a class="nav-link" href="/karyawan" style="color:white; font-size: 40px;"> Karyawan</a>
                </div>
                <div class="flex-about flex-about-home"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-4">
        <div class="new-flex-container">
            <div class="flex-slide cukur">
                <div class="flex-title flex-title-home">
                    <a class="nav-link" href="/cukur" style="color:white; font-size: 40px;"> Cukur</a>
                </div>
                <div class="flex-about flex-about-home"></div>
            </div>
            <div class="flex-slide penjualan">
                <div class="flex-title flex-title-home">
                    <a class="nav-link" href="/penjualan" style="color:white; font-size: 40px;"> Penjualan</a>
                </div>
                <div class="flex-about flex-about-home"></div>
            </div>
            <div class="flex-slide pembelian">
                <div class="flex-title flex-title-home">
                    <a class="nav-link" href="/pembelian" style="color:white; font-size: 40px;"> Pembelian</a>
                </div>
                <div class="flex-about flex-about-home"></div>
            </div>
            <div class="flex-slide grafik">
                <div class="flex-title flex-title-home">
                    <a class="nav-link" href="/grafik" style="color:white; font-size: 40px;"> Grafik</a>
                </div>
                <div class="flex-about flex-about-home"></div>
            </div>
        </div>
    </div>




    </main>

    <!-- Add your JavaScript and other scripts here -->
    <script>
        function toggleAnimation(element) {
            element.classList.toggle('fadeIn');
            element.classList.toggle('slideLeft');
            setTimeout(function() {
                element.classList.toggle('fadeIn');
                element.classList.toggle('slideLeft');
            }, 1000); // Adjust the duration of the animation as needed
        }
    </script>

    <?= $this->endSection() ?>