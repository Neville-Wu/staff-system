<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; STAFF SYSTEM</title>

    <?php include_once "view/scripts/css.php" ?>
</head>

<body>
<div id="app">
    <section class="section">
        <div class="d-flex flex-wrap align-items-stretch">
            <div class="col-lg-5 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                <div class="p-4 m-3">
                    <img src="assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
                    <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">STAFF SYSTEM</span></h4>
                    <p class="text-muted">Before you get started, you must login.</p>

                    <?php if (isset($errors)) {?>
                        <div class="alert alert-danger"><?= $errors?></div>
                    <?php }?>

                    <!-- Login form -->
                    <form method="POST" action="<?= Helpers::url('user/login')?>" class="needs-validation" novalidate="">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="login[email]" tabindex="1" required autofocus>
                            <div class="invalid-feedback">
                                Please fill in your email
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="login[password]" tabindex="2" required>
                            <div class="invalid-feedback">
                                please fill in your password
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <a href="#" class="float-left mt-3">
                                Forgot Password?
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                Login
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="col-lg-7 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="assets/img/unsplash/login-bg.jpg">
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="mb-2 display-4 font-weight-bold"><?= Custom::greeting();?></h1>
                            <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include_once "view/scripts/js.php" ?>

</body>
</html>
