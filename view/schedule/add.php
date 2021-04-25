<section class="section">
    <div class="section-header">
        <h1>Add a new shift</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <div class="mb-3">
            <a href="javascript:history.go(-1)" class="btn btn-lg btn-outline-secondary rounded-pill d-md-inline-block d-block mb-5"><i class="fas fa-angle-left mr-3"></i> Go Back</a>
            <a href="<?= Helpers::url('user/signup')?>" class="btn btn-lg btn-outline-secondary rounded-pill d-md-inline-block d-block mb-5 ml-2">Sign up</a>
        </div>

        <div class="card">
            <form class="needs-validation <?= isset($errors)?'was-validated':''?>" id="form" method="post" novalidate>
                <div class="card-body">

                    <?php if (isset($errors)) {?>
                        <p class="alert alert-danger"><?= $errors?></p>
                    <?php }?>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="start_time">Start time *</label>
                            <input type="datetime-local" class="form-control" value="<?= isset($data['start_time'])?$data['start_time']:''?>" id="start_time" name="schedule[start_time]" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end_time">End time *</label>
                            <input type="datetime-local" class="form-control" value="<?= isset($data['end_time'])?$data['end_time']:''?>" id="end_time" name="schedule[end_time]" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="location">Location *</label>
                        <input type="text" class="form-control" value="<?= isset($data['location'])?$data['location']:''?>" id="location" name="schedule[location]" required>
                    </div>


                    <!--<div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start_time">Start time *</label>
                            <input type="text" class="form-control datetimepicker" value="<?/*= isset($data['start_time'])?$data['start_time']:''*/?>" id="start_time" name="schedule[start_time]" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="end_time">End time *</label>
                            <input type="text" class="form-control datetimepicker" value="<?/*= isset($data['end_time'])?$data['end_time']:''*/?>" id="end_time" name="schedule[end_time]" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="location">Location *</label>
                            <input type="text" class="form-control" value="<?/*= isset($data['location'])?$data['location']:''*/?>" id="location" name="schedule[location]" required>
                        </div>
                    </div>-->

<!--                    <hr class="bg-dark mb-4">-->
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>