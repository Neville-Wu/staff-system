<section class="section">
    <div class="section-header">
        <h1>Allocation</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= Helpers::url('index/index')?>">Dashboard</a></div>
            <div class="breadcrumb-item">Allocation</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
        <div class="col-md-6">
            <div class="card">
            <div class="card-header"><h3>Schedule Detail</h3></div>
                <form class="needs-validation <?= isset($errors)?'was-validated':''?>" id="form" method="post" novalidate>
                    <div class="card-body">

                        <?php if (isset($errors)) {?>
                            <div class="alert alert-danger"><?= $errors?></div>
                        <?php }?>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Location</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th scope="row"><?= $schedule['id']?></th>
                                    <td><?= $schedule['name']?></td>
                                    <td><?= $schedule['start_time']?></td>
                                    <td><?= $schedule['end_time']?></td>
                                    <td><?= $schedule['location']?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </form>
            </div>
            </div>


        <div class="col-md-6">
            <div class="card">
            <div class="card-header">
                <h3>Allocated Staff</h3>
                <a class="nav-link" href="<?= Helpers::url('schedule/allocate') ?>">
                    <i class="far fa-calendar-plus"></i><span>Allocate Staff</span>
                </a>
             </div>
                <form class="needs-validation <?= isset($errors)?'was-validated':''?>" id="form" method="post" novalidate>
                    <div class="card-body">

                        <?php if (isset($errors)) {?>
                            <div class="alert alert-danger"><?= $errors?></div>
                        <?php }?>


                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Working Hours</th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($user as $u) {?>
                                <tr>
                                    <th scope="row"><?= $u['id']?></th>
                                    <td><?= $u['full_name']?></td>
                                    <td><?= $u['work_hours']?></td>
                                    <td><?= $u['role']?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>

                    </div>

                </form>
            </div>
        </div>
            </div>

    </div>
</section>