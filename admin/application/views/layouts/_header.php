<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav pull-right">

            <!--<li class="date-logout">最終ログイン日時　：　2013/3/5 19:26 </li>-->
            <li id="fat-menu" class="dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user" aria-hidden="true"></i> <?php echo $this->session->userdata('JUNONBOY_ADMIN')?>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('logout')?>" id="logout">Log out</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>