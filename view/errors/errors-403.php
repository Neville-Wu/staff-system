<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>403 &mdash; STAFF SYSTEM</title>

    <?php include_once "view/scripts/css.php" ?>
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="page-error">
                <div class="page-inner">
                    <h1>403</h1>
                    <div class="page-description">
                        You do not have access to this page.
                    </div>
                    <a class="btn btn-lg btn-outline-primary btn-round mt-5" href="<?= Helpers::url('index/index')?>">
                        <i class="fas fa-home"></i> Back to Home
                    </a>
                </div>
            </div>
            <div class="simple-footer mt-5">
                Copyright &copy; 2021 <i class="bullet"></i> Developed by SEPM B3-5 Team
            </div>
        </div>
    </section>
</div>

<?php include_once "view/scripts/js.php" ?>
</body>
</html>
