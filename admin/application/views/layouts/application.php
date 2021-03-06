<?php
$controller = $this->router->fetch_class();
$action = $this->router->fetch_method();
$segment = $this->uri->segment(3) ? $this->uri->segment(3) : '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $site_name ?></title>
    <link rel="stylesheet" href="<?php echo base_url('common/lib/bootstrap/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="robots" content="noindex,nofollow">
    <link href="<?php echo base_url('common/css/style.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('common/css/elements.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('common/css/colorbox.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('common/css/_theme.css'); ?>" type="text/css" rel="stylesheet">
    <script  src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script type="application/javascript" src="<?php echo base_url('common/js/bootstrap/bootstrap.js'); ?>"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->


    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

</head>
<body>
<?php echo $this->template->block('header', 'default/view', array('controller' => $controller, 'action' => $action)); ?>

<?php echo $this->template->block('leftpanel', 'default/view', array('controller' => $controller, 'action' => $action)); ?>
<div class="content">

    <div class="row" style="margin-left: 0px">
        <div class="header">
            <h1 class="page-title">title</h1>
        </div>
        <ul class="breadcrumb">
            <li>
                <a href="<?php base_url('admin') ?>">Home</a>
                <span class="divider">> </span>
            </li>
            <li class="active">管理カレンダー</li>
        </ul>
        <div class="col-sm-12">
           <?php if($action == "index"){?>
            <div class="row" style="width: 100%">
                <div class="search-box">
                    <?php echo $this->template->block('search','default/view', array('search'=>$search)) ?>
                </div>
            </div>
            <div class="row" style="width: 100%">
                <div class="content-box">
                    <?php echo $this->template->block('index','default/view', array('select_field'=>$select_field , 'count' => $count )) ?>
                </div>
            </div>
            <?php }else{?>
            <div class="row" style="width: 100%">
                <div class="content-box">
                    <?php echo $this->template->block($action,'default/view', array('obj'=> $obj,'controller' => $controller, 'action' => $action)) ?>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $('.input-daterange input').each(function() {

        $(this).datepicker({
            format: "yyyy/mm/dd"
        });
    });
</script>
</html>
