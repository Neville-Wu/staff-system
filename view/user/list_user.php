
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
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($userlist as $user) {?>
                        <tr>
                            <th scope="row"><?= $user['id']?></th>
                            <td><?= $user['full_name']?></td>
                            <td><?= $user['work_hours']?></td>
                            <td><?= $user['role']?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>