
<section class="section">
    <div class="section-header">
        <h1>List of Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= Helpers::url('index/index')?>">Dashboard</a></div>
            <div class="breadcrumb-item">User List</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Working Hours</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($userlist as $user) {?>
                        <tr>
                            <th scope="row"><?= $user['id']?></th>
                            <td><?= $user['full_name']?></td>
                            <td><?= $user['work_hours']?></td>
                            <td><?= $user['role']?></td>
                            <td>
                                <div class="badge badge-secondary"><?= $user['mode'] ?></div>
                            </td>
                            <td>
                                <a href="<?= Helpers::url('user/changeHours',['id'=>$user['id']]) ?>" class="btn btn-primary">Change Work Hours</a>

                                <?php if (isset($user['mode']) && $user['mode'] == 'deactivated') { ?>
                                    <a href="<?= Helpers::url('user/activateAccount',['id'=>$user['id']])?>" class="btn btn-success">Activate</a>
                                <?php } else if (isset($user['mode']) && $user['mode'] == 'activated') {?>
                                    <a href="<?= Helpers::url('user/deactivateAccount',['id'=>$user['id']])?>" class="btn btn-success">Deactivate</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>