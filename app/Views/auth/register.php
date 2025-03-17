<?= $this->extend('auth/template') ?>

<?= $this->section('content') ?>
<style>
    @keyframes slideRight {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(50%);
        }
    }

    @keyframes slideLeft {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .custom-text {
        font-size: 32px;
        font-family: Geneva, sans-serif;
        font-weight: 700;
        word-wrap: break-word;
        background: linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(240, 240, 240, 0.7));
        -webkit-background-clip: text;
        color: darkblue;
        display: inline-block;
        padding: 10px;
    }


    /* Style lainnya tetap sama */
</style>
<main>
    <div class="container">

        <div class="row justify-content-center">
            <div style="width: 100%; height: 100%; padding-top: 29px; padding-bottom: 41px; justify-content: center; align-items: center; display: inline-flex">
                <div class="custom-text-container">
                    <div class="custom-text">
                        <span style="--animation-order: 1;">SISTEM</span>
                        <span style="--animation-order: 2;">INFORMASI</span>
                        <span style="--animation-order: 3;">LOOK</span>
                        <span style="--animation-order: 4;">US</span>
                        <span style="--animation-order: 5;">BARBERSHOP</span>
                    </div>
                    <div class="col-lg-8 mx-auto">
                        <div class="card shadow-lg border-0 rounded-lg mt-8">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Register</h3>
                            </div>
                            <div class="card-body">
                                <!-- < ?= view('Myth\Auth\View\_message_block') ?> -->
                                <?php if (isset($validation)) : ?>
                                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                                <?php endif; ?>
                                <form action="/login/save" method="post">
                                    <?= csrf_field() ?>

                                    <div class="form-floating mb-3">
                                        <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="email" value="<?= old('email') ?>" /><label for="email">Email</label>

                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="Username" value="<?= old('username') ?>" /><label for="username">Username</label>

                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="password" autocomplete="off" /><label for="password">Password</label>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">

                                                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="Repeat Password" autocomplete="off" /><label for="inputPasswordConfirm">Repeat Password </label>
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Register</button>

                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <!-- <div class="small"><a href="login.html">Have an account? Go to login</a></div> -->
                                <div class="small">Sudah Punya Akun ? <a href="/login">Login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>