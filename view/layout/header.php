
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top p-3 px-md-4">
        <a href="<?= Helpers::url('index/index');?>" class="navbar-brand"><img src="assets/images/VANAL.png" alt="Logo"></a>

        <button class="navbar-toggler btn btn-lg" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="fas fa-bars text-white-50"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav m-auto">
                <?php include_once 'view/layout/nav.php'?>
            </ul>

            <div class="position-relative">
                <button class="btn btn-lg text-light float-md-right col-md-auto" type="button" data-toggle="collapse" data-target="#search">
                    <span class="fas fa-search float-left"></span>
                    <span class="fas fa-angle-down float-right d-md-none"></span>
                </button>
                <form method="get" class="collapse form-inline searchbar" id="search">
                    <input type="hidden" name="ctrl" value="index/search">
                    <input class="form-control rounded-pill my-md-0 my-2 col-12 col-md-9" type="text" placeholder="Search Title, Genre" name="search" required>
                    <button class="btn btn-success rounded-pill col-12 col-md-3" type="submit">Search</button>
                </form>
            </div>

            <div class="ml-md-3 my-2 my-md-0 position-relative">
                <?php if (Helpers::sess()) {?>
                    <button class="btn btn-lg w-100 text-light" data-toggle="collapse" data-target="#user">
                        <span class="float-left"><span class="fas fa-user"></span>
                            <?= $_SESSION['user']['username']?></span>
                        <span class="fas fa-angle-right float-right d-md-none"></span>
                    </button>
                    <div class="collapse position-absolute px-3 py-2 bg-white rounded-lg" id="user">
                        <div><a href="<?= Helpers::url('user/logout')?>">Logout</a></div>
                    </div>
                <?php } else {?>
                    <a href="<?= Helpers::url('user/login');?>" class="btn btn-lg w-100 text-light">
                        <span class="fas fa-user float-left"></span>
                        <span class="fas fa-angle-right float-right d-md-none"></span>
                    </a>
                <?php }?>
            </div>
        </div>
    </nav>
</header>
