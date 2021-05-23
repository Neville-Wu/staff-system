<section class="section">
    <div class="section-header">
        <h1>Change Work Hours</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= Helpers::url('index/index')?>">Dashboard</a></div>
            <div class="breadcrumb-item">Change Work Hours</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <form method="post" class="needs-validation" novalidate="">
                <div class="card-body">
                    <?php if (isset($errors)) {?>
                        <div class="alert alert-danger"><?= $errors?></div>
                    <?php }?>

                    <div class="form-group">
                        <label for="hours">Change Hours *</label>
                        <input type="number" id="hours" class="form-control" name="hours" value="<?= $user['work_hours']?>"  min="0" max="100" required="">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</section>
