<div class="navbar-bg"></div>

<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">

        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg
            <?= count(User::getNoteProcess()) ? 'beep' : '';?>"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <!--<div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>-->
                </div>

                <div class="dropdown-list-content dropdown-list-icons">
                    <div class="dropdown-item dropdown-item-unread">
                        <?php foreach (User::getNoteProcess() as $u) {?>
                            <div class="dropdown-item-icon bg-primary text-white">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                Are you satisfied with this allocation?
                                <div><?= $u['start_time'] . ' - ' . $u['end_time'];?></div>
                                <div>
                                    <a href="<?= Helpers::url('user/setScheduleStatus', ['request' => 'Accepted', 'id'=>$u['s_id']]) ?>" class="btn btn-success btn-sm">Accept</a>
                                    <a href="<?= Helpers::url('user/setScheduleStatus', ['request' => 'Rejected', 'id'=>$u['s_id']]) ?>" class="btn btn-danger btn-sm">Reject</a>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>

                <div class="dropdown-footer text-center">
                    <a href="<?= Helpers::url('user/listNotification')?>">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, <?= $_SESSION['user']['full_name'] ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?= Helpers::url('user/profile') ?>" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= Helpers::url('user/logout') ?>" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.php">Staff System</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">SS</a>
        </div>
        <?php include_once "navigation.php"; ?>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>

