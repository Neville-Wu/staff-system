<section class="section-p">
    <div class="container text-white my-5 py-5">
        <div class="mb-5">
            <a href="javascript:history.go(-1)" class="btn btn-lg btn-outline-secondary rounded-pill d-md-inline-block d-block mb-5"><i class="fas fa-angle-left mr-3"></i> Go Back</a>
            <a href="<?= Helpers::url('user/signup')?>" class="btn btn-lg btn-outline-secondary rounded-pill d-md-inline-block d-block mb-5 ml-2">Sign up</a>
            <h1>Login</h1>
        </div>

        <div>
            <form class="needs-validation <?= isset($errors)?'was-validated':''?>" id="form" method="post" novalidate>

                <?php if (isset($errors)) {?>
                    <p class="alert alert-danger"><?= $errors?></p>
                <?php }?>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="username">Username *</label>
                        <input type="text" class="form-control" value="<?= isset($data['username'])?$data['username']:''?>" id="username" name="login[username]" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" value="<?= isset($data['password'])?$data['password']:''?>" id="password" name="login[password]" required>
                    </div>
                </div>

                <hr class="bg-dark mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</section>