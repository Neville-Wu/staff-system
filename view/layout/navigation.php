
<ul class="sidebar-menu">
    <li>
        <a class="nav-link" href="<?= Helpers::url('index/index') ?>">
            <i class="fas fa-fire"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="menu-header">Shift Management</li>
    <li>
        <a class="nav-link" href="<?= Helpers::url('schedule/managerCalendar') ?>">
            <i class="far fa-calendar-alt"></i> <span>Manager Calendar</span>
        </a>
    </li>
    <li>
        <a class="nav-link" href="<?= Helpers::url('schedule/list') ?>">
            <i class="fas fa-list"></i> <span>Shift List</span>
        </a>
    </li>
    <li>
        <a class="nav-link" href="<?= Helpers::url('schedule/add') ?>">
            <i class="far fa-calendar-plus"></i> <span>Add New Shift</span>
        </a>
    </li>

    <li class="menu-header">User Management</li>
    <li>
        <a class="nav-link" href="<?= Helpers::url('user/listUser') ?>">
            <i class="fas fa-users"></i> <span>User List</span>
        </a>
    </li>
    <li>
        <a class="nav-link" href="<?= Helpers::url('user/createAccount') ?>">
            <i class="fas fa-users"></i> <span>Create Account</span>
        </a>
    </li>

    <li class="menu-header">Staff</li>
    <li>
        <a class="nav-link" href="<?= Helpers::url('schedule/staffCalendar') ?>">
            <i class="far fa-calendar-alt"></i> <span>Staff Calendar</span>
        </a>
    </li>
    <li>
        <a class="nav-link" href="<?= Helpers::url('schedule/getAllocationHistory') ?>">
            <i class="far fa-calendar-alt"></i> <span>Allocation History</span>
        </a>
    </li>
</ul>