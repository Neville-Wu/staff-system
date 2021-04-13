<section class="section-p">
    <div class="container text-white my-5 py-5">
        <div class="mb-5">
            <a href="javascript:history.go(-1)" class="btn btn-lg btn-outline-secondary rounded-pill d-md-inline-block d-block mb-5"><i class="fas fa-angle-left mr-3"></i> Go Back</a>
            <a href="<?= Helpers::url('user/login')?>" class="btn btn-lg btn-outline-secondary rounded-pill d-md-inline-block d-block mb-5 ml-2">Login</a>
            <h1>Sign up</h1>
        </div>

        <div>
            <?php if (isset($errors)) {foreach ($errors as $v) {?>
                <div class="alert alert-danger"><?= $v?></div>
            <?php }}?>

            <form class="needs-validation <?= isset($errors)?'was-validated':''?>" id="form" method="post" novalidate>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="first_name">First Name *</label>
                        <input type="text" class="form-control" value="<?= isset($data['first_name'])?$data['first_name']:''?>" id="first_name" name="signup[first_name]" required>
                        <div class="invalid-feedback">
                            <?= isset($errors['first_name'])?$errors['first_name']:''?>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="last_name">Last Name *</label>
                        <input type="text" class="form-control" value="<?= isset($data['last_name'])?$data['last_name']:''?>" id="last_name" name="signup[last_name]" required>
                        <div class="invalid-feedback">
                            <?= isset($errors['last_name'])?$errors['last_name']:''?>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="username">Username *</label>
                        <input type="text" class="form-control" value="<?= isset($data['username'])?$data['username']:''?>" id="username" name="signup[username]" required>
                        <div class="invalid-feedback">
                            <?= isset($errors['username'])?$errors['username']:''?>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" value="<?= isset($data['password'])?$data['password']:''?>" id="password" name="signup[password]" required>
                        <div class="invalid-feedback">
                            <?= isset($errors['password'])?$errors['password']:''?>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="cpassword">Confirm Password *</label>
                        <input type="password" class="form-control" value="<?= isset($data['cpassword'])?$data['cpassword']:''?>" id="cpassword" name="signup[cpassword]" required>
                        <div class="invalid-feedback">
                            <?= isset($errors['cpassword'])?$errors['cpassword']:''?>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" value="<?= isset($data['phone'])?$data['phone']:''?>" id="phone" name="signup[phone]">
                        <small class="text-danger"><?= isset($errors['phone'])?$errors['phone']:''?></small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" value="<?= isset($data['email'])?$data['email']:''?>" id="email" name="signup[email]">
                        <small class="text-danger"><?= isset($errors['email'])?$errors['email']:''?></small>
                    </div>
                </div>

                <hr class="bg-dark mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</section>