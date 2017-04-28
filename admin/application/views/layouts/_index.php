<?php $total_page = $count / LIMIT; ?>

<div class="container-fluid">
    <div class="well">
        <?php if (!in_array($controller, HIDE_NEW_BUTTON)) { ?>
            <a style="margin-bottom: 10px" href="<?php echo base_url() . "index.php/$controller/create" ?>"
               class="btn btn-default btn-lg" role="button">New</a>
        <?php } ?>
        <form method="GET" action="<?php echo base_url("index.php/pushes/create") ?> " id="frm_push">
            <table class="table table-striped">
                <thead>
                <tr>
                    <?php if (in_array($controller, CHECKED_BOX_BUTTON)) { ?>
                        <th></th>
                    <?php } ?>
                    <?php foreach ($select_field as $key => $value) { ?>
                        <th><?php echo $key ?></th>

                    <?php } ?>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($data) { ?>
                    <?php foreach ($data as $row) { ?>
                        <tr>   <?php if (in_array($controller, CHECKED_BOX_BUTTON)) { ?>
                                <td>

                                    <div class="checkbox">
                                        <label><input type="checkbox" id="<?php echo $row['id']?>"
                                                      value="<?php echo $row["id"] ?>"></label>
                                    </div>
                                </td>
                            <?php } ?>
                            <?php foreach ($row as $value) { ?>
                                <td>
                                    <div style="margin: 10px 0px 10px 0"><?php echo $value ?></div>
                                </td>
                            <?php } ?>
                            <td>
                                <a href="<?php echo base_url() . "index.php/$controller/show?id=$row[id]" ?>"
                                   class="btn btn-primary" role="button">Edit</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url() . "index.php/$controller/delete?id=$row[id]" ?>"
                                   class="btn btn-danger" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
            <ul class="pagination" style="float: right">

                <?php  $href = strpos($_SERVER['QUERY_STRING'], '&page') !== false ? substr($_SERVER['QUERY_STRING'],0,strpos($_SERVER['QUERY_STRING'], '&page')) : $_SERVER['QUERY_STRING'] ?>
                <?php for ($i = 0; $i <= $total_page; $i++) { ?>
                    <li>

                        <a href="<?php echo current_url().'?' . $href . "&page=$i" ?>"><?php echo $i + 1 ?></a>
                    </li>
                <?php } ?>

            </ul>
            <input style="margin-top: 10px" class="btn btn-default" type="submit"  class="btn btn-default">
        </form>

    </div>
</div>
<script type="text/javascript">
    var checkboxValues = JSON.parse(localStorage.getItem('checkboxValues')) || {};
    var $checkboxes = $(".checkbox :checkbox");

    $checkboxes.on("change", function () {
        $checkboxes.each(function () {
            checkboxValues[this.id] = this.checked;
        });
        localStorage.setItem("checkboxValues", JSON.stringify(checkboxValues));
    });
    $(window).on('load',function(){
        $.each(checkboxValues, function (key,value) {
            $("#" + key).prop('checked', value);
        }
    )});
    $("#frm_push").submit( function(eventObj) {
        $.each(checkboxValues,function (key,value) {
            if(value == true) {
                $('<input />').attr('type', 'hidden')
                    .attr('name', "chk_push[]")
                    .attr('value', key)
                    .appendTo('#frm_push');
            }
        })

        return true;
    });




</script>