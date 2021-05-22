<section class="section">
    <div class="section-header">
        <h1>Allocation</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= Helpers::url('index/index') ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Allocation</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header"><h3>Schedule Detail</h3></div>
                    <div class="mb-4">
                        <a class="btn btn-success" href="<?= Helpers::url('schedule/editDuration',['id'=>$_GET['id']]) ?>">
                            <i class="far fa-calendar-plus"></i> <span>Change Duration</span>
                        </a>
                    </div>
                    <form class="needs-validation <?= isset($errors) ? 'was-validated' : '' ?>" id="form" method="post"
                          novalidate>
                        <div class="card-body">

                            <?php if (isset($errors)) { ?>
                                <div class="alert alert-danger"><?= $errors ?></div>
                            <?php } ?>

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
                                    <th scope="row"><?= $schedule['id'] ?></th>
                                    <td><?= $schedule['name'] ?></td>
                                    <td><?= $schedule['start_time'] ?></td>
                                    <td><?= $schedule['end_time'] ?></td>
                                    <td><?= $schedule['location'] ?></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </form>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3>Staff List</h3>
                    </div>
                    <form class="needs-validation <?= isset($errors) ? 'was-validated' : '' ?>" id="form" method="post"
                          novalidate>
                        <div class="card-body">

                            <?php if (isset($errors)) { ?>
                                <div class="alert alert-danger"><?= $errors ?></div>
                            <?php } ?>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Remain Hours</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($userstatus as $u) { ?>
                                    <tr>
                                        <th scope="row"><?= $u['id'] ?></th>
                                        <td><?= $u['full_name'] ?></td>
                                        <td><?= $u['timestatus'] ?></td>
                                        <td><?= $u['hours'] ?></td>
                                        <td>
                                            <?php if (isset($u['status']) && $u['status'] == 'In Processing') { ?>
                                                <div class="badge badge-secondary"><?= $u['status'] ?></div>
                                            <?php } else if (!in_array($u['id'], $allocate_id) &&
                                                    $u['timestatus'] == 'available') {
                                                if ((new DateTime($schedule['start_time']))
                                                        ->diff(new DateTime($schedule['end_time']))->h <= $u['hours']) {?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="allocate[s_id]"
                                                           value="<?= $_GET['id'] ?>">
                                                    <input type="hidden" name="allocate[u_id]" value="<?= $u['id'] ?>">
                                                    <button class="btn btn-success">Allocate</button>
                                                </form>
                                            <?php }} else if (isset($u['status'])) {?>
                                                <div class="badge badge-info"><?= $u['status'] ?></div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</section>