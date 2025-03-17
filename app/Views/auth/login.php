<?= $this->extend('auth/template') ?>

<?= $this->section('content') ?>

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
                </div>
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Login Barbershop</h3>
                            <div class="card-body">
                                <form action="/login/auth" method="post">
                                    <?= csrf_field() ?>

                                    <div class="form-floating mb-3">
                                        <input class="form-control <?php if (session('msg')) : ?>is-invalid<?php endif ?>" name="username" placeholder="Email atau Username" type="text" /> <label for="username">Email atau Username</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control <?php if (session('msg')) : ?>is-invalid<?php endif ?>" name="password" type="password" placeholder="password" />
                                        <label for="password">Password</label>
                                        <div class="invalid-feedback">
                                            <?= session('msg') ?>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>

                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="login/register">Register</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
</body>
<?= $this->endsection() ?>