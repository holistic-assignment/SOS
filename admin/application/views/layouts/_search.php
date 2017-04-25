<div class="container-fluid">
    <form type="submit" id="test" name="test" method="get">
        <div class="well" style="border:1px">
            <div class="row">
            <?php
            foreach ($search as $key => $value) { ?>

                <div class="col-sm-6">

                    <div class="col-sm-2">
                        <label for="<?php echo $key ?>"
                               style="padding-top: 4px; margin-top: 10px"><?php echo $key ?></label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="<?php echo $key?>"
                               style="width:164px;height:30px;padding: 4px 6px;margin-top: 10px">
                    </div>

                </div>
            <?php }
            ?></div>


            <div class="row">
                <div class="col-sm-4 col-sm-push-8" style="margin-top: 20px">
                    <button type="submit" class="btn btn-default">Search</button>
                </div>
            </div>
        </div>
    </form>
</div>

