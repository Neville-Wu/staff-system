<section class="section">
    <div class="section-header">
        <h1>My Notification</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= Helpers::url('index/index')?>">Dashboard</a></div>
            <div class="breadcrumb-item">My Notification</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Accepted / Rejected Allocation</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($schedule as $n) {?>
                        <tr>
                            <th scope="row"><?= $n['s_id']?></th>
                            <td><?= $n['start_time']?></td>
                            <td><?= $n['end_time']?></td>
                            <td><?= $n['status']?></td>
                            <td>
                                <?php if ($n['status'] == 'In Processing') {?>
                                    <p>Are you satisfied with this allocation?</p>
                                <?php }?>
                            </td>
                            <td>
                                <?php if ($n['status'] == 'In Processing') {?>
                                    <a href="<?= Helpers::url('user/setScheduleStatus', ['request' => 'Accepted', 'id'=>$n['s_id']]) ?>" class="btn btn-success btn-sm">Accept</a>
                                    <a href="<?= Helpers::url('user/setScheduleStatus', ['request' => 'Rejected', 'id'=>$n['s_id']]) ?>" class="btn btn-danger btn-sm">Reject</a>
                                <?php }?>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Work Hours Adjustment</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date / Time</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($notification as $n) {?>
                        <tr class="<?= $n['status']=='unread' ? 'bg-warning text-white' : '';?>">
                            <th scope="row"><?= $n['id']?></th>
                            <td><?= $n['message']?></th>
                            <td><?= $n['datetime']?></td>
                            <td>
                                <b class="text-uppercase"><?= $n['status']?></b>
                            </td>
                            <td>
                                <?php if ($n['status'] == 'unread') {?>
                                    <a href="<?= Helpers::url('user/listNotification', ['read' => $n['id']]) ?>"
                                       class="btn btn-outline-white btn-round">
                                        Mark Read
                                    </a>
                                <?php }?>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
