<section class="section">
    <div class="section-header">
        <h1>Allocate Staff</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= Helpers::url('index/index')?>">Dashboard</a></div>
            <div class="breadcrumb-item">Allocate Staff</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <form class="needs-validation <?= isset($errors)?'was-validated':''?>" id="form" method="post" novalidate>
                <div class="card-body">

                    <?php if (!empty($error)) {?>
                        <div class="alert alert-danger"><?= $error?></div>
                    <?php }?>

                    <?php foreach ($user as $u)?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Working Hours</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($user as $u) {?>
                            <tr>
                                <th scope="row"><?= $u['id']?></th>
                                <td><?= $u['full_name']?></td>
                                <td><?= $u['work_hours']?></td>
                                <td><?= $u['role']?></td>
                                <td><?= $u['timestatus']?></td>
                                <td>
                                    <?php if ($u['timestatus'] == 'available') {?>
                                        <form action="" method="post">
                                            <input type="hidden" name="allocate[s_id]" value="<?= $_GET['id']?>">
                                            <input type="hidden" name="allocate[u_id]" value="<?= $u['id']?>">
                                            <button class="btn btn-success">Allocate</button>
                                        </form>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>

                </div>

            </form>
        </div>
    </div>
</section>