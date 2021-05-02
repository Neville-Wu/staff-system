<section class="section">
    <div class="section-header">
        <h1>Add New Shift</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= Helpers::url('index/index')?>">Dashboard</a></div>
            <div class="breadcrumb-item">Add New Shift</div>
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
                            <input type="text" class="form-control" value="<?= isset($data['name'])?$data['name']:''?>" id="name" name="schedule[name]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="location">Location *</label>
                            <input type="text" class="form-control" value="<?= isset($data['location'])?$data['location']:''?>" id="location" name="schedule[location]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="start_time">Start time *</label>
                            <input type="datetime-local" class="form-control" value="<?= isset($data['start_time'])?$data['start_time']:''?>" id="start_time" name="schedule[start_time]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end_time">End time *</label>
                            <input type="datetime-local" class="form-control" value="<?= isset($data['end_time'])?$data['end_time']:''?>" id="end_time" name="schedule[end_time]" required>
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