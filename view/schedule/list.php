
<section class="section">
    <div class="section-header">
        <h1>List of Shifts</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
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
                    <?php foreach ($list as $schedule) {?>
                        <tr>
                            <th scope="row"><?= $schedule['id']?></th>
                            <td><?= $schedule['name']?></td>
                            <td><?= $schedule['start_time']?></td>
                            <td><?= $schedule['end_time']?></td>
                            <td><?= $schedule['location']?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>