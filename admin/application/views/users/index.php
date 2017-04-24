
<?php

foreach ($search as $key=>$value){ ?>
    <div class="col-sm-6">
        <label for="<?php echo $key ?>"><?php echo $key ?></label>
        <input type="text" name="<?php echo $key ?> " style="width:164px;height:30px;padding: 4px 6px">
    </div>
<?php }
?>

