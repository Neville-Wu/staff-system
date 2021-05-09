

<section class="section">
    <div class="section-header">
        <h1>Staff Calendar</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= Helpers::url('index/index')?>">Dashboard</a></div>
            <div class="breadcrumb-item">Staff Calendar</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div class="fc-overflow">
                    <li>
                        <a class="nav-link" href="<?= Helpers::url('timeStatus/add') ?>">
                            <i class="far fa-calendar-plus"></i> <span>Add Time Status</span>
                        </a>
                    </li>
                    <div id="staff_calendar"></div>
                </div>
            </div>
        </div>
    </div>
</section>