<style>

    .sidebar-nav ul li a {
        text-align: left !important;
    }

    .sidebar-nav .nav-header {
        font-weight: bold !important;
    }

</style>
<div>
    <div class="sidebar-nav">
        <a class="nav-header collapsed"><i class="fa fa-star" aria-hidden="true"></i> Management </a>
        <ul id="error-menu" class="nav nav-list collapse in subMenu">
            <li class="lineMn"></li>
            <li class="subMn <?php if ($controller == 'users') echo 'active' ?>"><a
                    href="<?php echo site_url('users/index'); ?>">User Management</a>
            </li>
            <li class="lineMn"></li>
            <li class="subMn <?php if ($controller == 'topic') echo 'active' ?>"><a
                    href="<?php echo site_url('messages/index'); ?>">Message Management</a>
            </li>
            <li class="lineMn"></li>
            <li class="subMn <?php if ($controller == 'project') echo 'active' ?>"><a
                    href="<?php echo site_url('news/index'); ?>">News Management</a>
            </li>
            <li class="lineMn"></li>
            <li class="subMn <?php if ($controller == 'calendar') echo 'active' ?>"><a
                    href="<?php echo site_url('dangerous/index'); ?>">Dangerous News Management</a>
            </li>
            <li class="lineMn"></li>
            <li class="subMn <?php if ($controller == 'category') echo 'active' ?>"><a
                    href="<?php echo site_url('category/index'); ?>">Push Management</a>
            </li>
            <li class="lineMn"></li>
            <li class="subMn <?php if ($controller == 'rank') echo 'active' ?>"><a
                    href="<?php echo site_url('rank/index'); ?>">App Information Management</a>
            </li>
            <li class="lineMn"></li>
            <li class="subMn <?php if ($controller == 'skill') echo 'active' ?>"><a
                    href="<?php echo site_url('skill/index'); ?>">Support Center Information Management</a>
            </li>
            <li class="lineMn"></li>
            <li class="subMn <?php if ($controller == 'holiday') echo 'active' ?>"><a
                    href="<?php echo site_url('holiday/index'); ?>">Location Map</a>
            </li>

        </ul>
    </div>
</div>