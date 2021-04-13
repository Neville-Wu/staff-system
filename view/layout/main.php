<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff System</title>
    <?php include_once 'view/scripts/css.php';?>
    <?php include_once 'view/scripts/js.php';?>
</head>

<body class="shadow-layout sticky-header light-header sticky-navigation <?= CTRL;?>">

<?php include_once('view/layout/navigation.php');?>

<!-- begin::main -->
<div id="main">

    <!-- begin::header -->
    <div class="header">

        <!-- begin::header left -->
        <ul class="navbar-nav">

            <!-- begin::header-logo -->
            <li class="nav-item" id="header-logo">
                <a href="index.html">
                    <img class="logo" src="assets/media/image/logo.png" alt="logo">
                    <img class="logo-sm" src="assets/media/image/logo-sm.png" alt="small logo">
                    <img class="logo-dark" src="assets/media/image/logo-dark.png" alt="dark logo">
                </a>
            </li>
            <!-- end::header-logo -->
        </ul>
        <!-- end::header left -->

        <!-- begin::header-right -->
        <div class="header-right">
            <ul class="navbar-nav">

                <!-- begin::search-form -->
                <li class="nav-item search-form">
                    <div class="row">
                        <div class="col-md-6">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-default" type="button">
                                            <i class="icon ti-search text-dark font-size-16"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </li>
                <!-- end::search-form -->

                <!-- begin::header notification -->
                <li class="nav-item">
                    <a href="#" class="nav-link nav-link-notify" title="Notifications">
                        <i class="icon ti-bell text-dark font-size-24"></i>
                    </a>
                </li>
                <!-- end::header notification -->
            </ul>
        </div>
        <!-- end::header-right -->
    </div>
    <!-- end::header -->

    <!-- begin::main-content -->
    <div class="main-content">

        <!-- begin::container -->
        <div class="container">

            <?php include_once('view/'.$url.'.php');?>

        </div>
        <!-- end::container -->

    </div>
    <!-- end::main-content -->

</div>
<!-- end::main -->

</body>
</html>