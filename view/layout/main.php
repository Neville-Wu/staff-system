<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>STAFF SYSTEM</title>

    <?php include_once "view/scripts/css.php"?>
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <?php include_once "sidebar.php";?>

        <!-- Main Content -->
        <div class="main-content">
            <?php include_once "view/" . $url . ".php";?>
        </div>

        <?php include_once "footer.php";?>
    </div>
</div>

<?php include_once "view/scripts/js.php"?>

</body>
</html>
