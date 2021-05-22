<section class="section">
    <div class="section-header">
        <h1>Change Shift Duration</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= Helpers::url('index/index')?>">Dashboard</a></div>
            <div class="breadcrumb-item">Change Shift Duration</div>
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
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" value="<?= isset($schedule['name'])?$schedule['name']:''?>" id="name" name="schedule[name]" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="location">Location *</label>
                            <input type="text" class="form-control" value="<?= isset($schedule['location'])?$schedule['location']:''?>" id="location" name="schedule[location]" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="start_time">Start time *</label>
                            <input type="datetime-local" class="form-control" value="<?= isset($schedule['start_time'])?date('Y-m-d\TH:i',strtotime($schedule['start_time'])):''?>" id="start_time" name="schedule[start_time]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end_time">End time *</label>
                            <input type="datetime-local" class="form-control" value="<?= isset($schedule['end_time'])?date('Y-m-d\TH:i',strtotime($schedule['end_time'])):''?>" id="end_time" name="schedule[end_time]" required>
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