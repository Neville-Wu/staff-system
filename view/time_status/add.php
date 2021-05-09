<section class="section">
    <div class="section-header">
        <h1>Add Time Status</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= Helpers::url('index/index')?>">Dashboard</a></div>
            <div class="breadcrumb-item">Add Time Status</div>
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
                            <label for="start_time">Start time *</label>
                            <input type="datetime-local" class="form-control" value="<?= isset($data['start_time'])?$data['start_time']:''?>" id="start_time" name="time_status[start_time]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end_time">End time *</label>
                            <input type="datetime-local" class="form-control" value="<?= isset($data['end_time'])?$data['end_time']:''?>" id="end_time" name="time_status[end_time]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description">description *</label>
                            <input type="text" class="form-control" value="<?= isset($data['description'])?$data['description']:''?>" id="description" name="time_status[description]" required>
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