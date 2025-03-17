<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="">
            <h1>container</h1>
        </div>
        <!-- <div class="bg-warning"> -->
        <!-- <div class=""> -->
        <div class="row bg-warning">
            <div class="">
                <center>
                    <p class="fw-bold bg-warning"> Container 1 - gambar</p>
                    <div class="container">
                </center>
                <div class="bg-warning">
                    <div class="row">

                        <div class="col-sm-6 bg-primary">
                            <center>
                                <img src="https://4.bp.blogspot.com/-p_MuFFK_yJg/XLIKHIBvODI/AAAAAAAAFG8/HjCkUsaFleEFWwda_rYps9he9BAOK-MGwCLcBGAs/s1600/naruto%2Bbergerak.gif" width="350px" height="200px" style="margin-top: 50px;">

                                <p class="fw-bold">Gambar 1 </p>
                            </center>
                        </div>
                        <div class="col-sm-6 bg-success">
                            <!-- <div class="bg-success"> -->
                            <center>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Naruto_logo.svg/800px-Naruto_logo.svg.png" width="350px" height="200px" style="margin-top: 50px;">
                                <p class="fw-bold">Naruto Shippuden</p>


                            </center>
                        </div>

                    </div>
                </div>
            </div>

            <!-- </div> -->
        </div>
        </div>
        </div>
        </div>


        <div class="row bg-warning">
            <div class="">
                <center>
                    <p class="fw-bold"> Container - Pesan dan Kesan </p>
                    <div class="container">
                </center>
                <div class="row bg-warning">
                    <div class="col-sm-7 bg-info">
                        <center>
                            <h1>Pengalaman Belajar Siweb:</h1>
                            <p>pesan dan kesan dalam belajar siweb adlah sangat berkesan dan snagat menarik dalam belajar dan coding</p>
                        </center>
                    </div>
                    <div class="col-sm-5 bg-primary">
                        <center>
                            <h1>Pesan dan Kesan Kepada ASDOS</h1>
                            <p>Kesan :
                                SENANGGG dan snagata sangat ,menyenangkan dan snagat menarik</p>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </body>

    </html>

</main><?= $this->endSection() ?>