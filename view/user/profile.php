<section class="section">
    <div class="section-header">
        <h1>My Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= Helpers::url('index/index')?>">Dashboard</a></div>
            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, <?= $_SESSION['user']['full_name'] ?>!</h2>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="assets/img/avatar/avatar-1.png"
                             class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Role</div>
                                <div class="profile-widget-item-value"><?= strtoupper($_SESSION['user']['role']) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Full Name:</span>
                                <b><?= $_SESSION['user']['full_name'] ?></b>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Preferred Name:</span>
                                <b><?= $_SESSION['user']['preferred_name'] ?></b>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Phone Number:</span>
                                <b><?= $_SESSION['user']['phone'] ?></b>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Home Address:</span>
                                <b><?= $_SESSION['user']['home_address'] ?></b>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Email:</span>
                                <b><?= $_SESSION['user']['email'] ?></b>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Working hours (per week):</span>
                                <b><?= $_SESSION['user']['work_hours'] ?></b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                    <form method="post" class="needs-validation" novalidate="">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="full_name">Full Name *</label>
                                    <input type="text" id="full_name" class="form-control" name="user[full_name]" value="<?= $_SESSION['user']['full_name']?>" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="preferred_name">Preferred Name</label>
                                    <input type="text" id="preferred_name" class="form-control" name="user[preferred_name]" value="<?= $_SESSION['user']['preferred_name']?>">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" class="form-control" name="user[email]" value="<?= $_SESSION['user']['email']?>" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="phone">Phone</label>
                                    <input type="tel" id="phone" class="form-control" name="user[phone]" value="<?= $_SESSION['user']['phone']?>">
                                </div>
                                <div class="form-group col-12">
                                    <label for="home_address">Address</label>
                                    <input type="text" id="home_address" class="form-control" name="user[home_address]" value="<?= $_SESSION['user']['home_address'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="post" class="needs-validation" novalidate="">
                        <div class="card-header">
                            <h4>Change Password</h4>
                        </div>
                        <div class="card-body">

                            <?php if (isset($errors)) {?>
                                <div class="alert alert-danger"><?= $errors?></div>
                            <?php }?>

                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="pwd">Password *</label>
                                    <input type="password" id="pwd" class="form-control" name="pwd[password]" required="">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="repwd">Confirm Password *</label>
                                    <input type="password" id="repwd" class="form-control" name="pwd[repwd]" required="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
