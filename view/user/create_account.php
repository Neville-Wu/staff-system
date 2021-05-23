<section class="section">
    <div class="section-header">
        <h1>Create New Account</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= Helpers::url('index/index')?>">Dashboard</a></div>
            <div class="breadcrumb-item">Create New Account</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <form class="needs-validation <?= isset($errors)?'was-validated':''?>" id="form" method="post" novalidate>
                <div class="card-body">

                    <?php if (isset($errors)) {?>
                        <div class="alert alert-danger"><?= $errors?></div>
                    <?php }?>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" value="<?= isset($data['email'])?$data['email']:''?>" id="email" name="user[email]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password *</label>
                            <input type="password" class="form-control" value="<?= isset($data['password'])?$data['password']:''?>" id="password" name="user[password]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="full_name">Full Name *</label>
                            <input type="text" class="form-control" value="<?= isset($data['full_name'])?$data['full_name']:''?>" id="full_name" name="user[full_name]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="work_hours">Work Hours *</label>
                            <input type="number" class="form-control" value="<?= isset($data['work_hours'])?$data['work_hours']:20?>" id="work_hours" name="user[work_hours]" min="0" max="100" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="role">Role *</label>
                            <select class="form-control" value="role" id="role" name="user[role]" required>
                                <option>staff</option>
                                <option>manager</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>