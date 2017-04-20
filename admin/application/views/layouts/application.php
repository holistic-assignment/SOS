<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $site_name ?></title>
    <link href="<?php echo base_url('common/css/style.css'); ?>" type="text/css" rel="stylesheet">
</head>

<body>
<div class="app-container">
    <div class="sidebar">
        <ul class="sidebar__list">
            <a class="sidebar__link sidebar__link--active" href="#">Dangers</a>
        </ul>
        <ul class="sidebar__list">
            <a class="sidebar__link sidebar__link--inactive" href="#">Messages</a>
        </ul>
        <ul class="sidebar__list">
            <a class="sidebar__link sidebar__link--inactive" href="#">News</a>
        </ul>
        <ul class="sidebar__list">
            <a class="sidebar__link sidebar__link--inactive" href="#">Users</a>
        </ul>
    </div>
    <div class="main-content" role="main">
        <form class="search">
            <span class="search__icon"></span>
            <input type="text" name="search" class="search__input" placeholder="Search" value aria-label="Search"/>
        </form>
        <header class="header">
            <h1 class="header__heading" id="page-title">Title</h1>
        </header>
        <table class="collection-data" aria-labelledby="page-title">

        </table>
        <?php echo $this->template->yield_template(); ?>
    </div>
</div>
</body>
</html>
