<?php $constant = constant('HIDDEN_'.strtoupper(singular($controller)).'_VIEW');?>
<div class="container-fluid marT10">
    <div class="row-fluid">
        <form action="<?php echo base_url("index.php/$controller/create") ?>" method="post" id="frm_new">
            <table class="table-striped" cellpadding="1" cellspacing="1">
                <tbody>

                <?php foreach ($obj as $key => $value) { ?>
                <?php if(!in_array($key,$constant)){ ?>
                    <tr style="line-height: 30px;min-height: 30px;height: 30px;">

                        <th style="width: 100px;background-color: #ECECEC"><?php echo $key ?></th>
                        <td style="width: 530px;min-width: 530px;max-width: 530px">
                            <?php if($value == 'DATE_TAG'){
                                edti_date_tag($key);
                            }else if($value == 'SELECT_TAG'){
                                select_tag_type($key);
                            }else{
                                textbox_for($key);
                             } ?>
                        </td>
                    </tr>
                    <?php }
                    else{
                        textbox_for($key,"","hidden");
                    }?>
                <?php } ?>
                </tbody>
            </table>
            <input style="margin-top: 10px" class="btn btn-default" type="submit" value="Update" class="btn btn-default" >

            <button style="margin-top: 10px" class="btn btn-default" onclick="goBack()">Go Back</button>
        </form>
    </div>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>


<?php

if(isset($_GET['chk_push'])){
    $param = json_encode($_GET['chk_push']);?>
<script type="">
    users = <?php echo $param;?>;
    $('#frm_new').on('submit', function (event) {
        $.each(users, function (key,value) {
            $('<input />').attr('type', 'hidden')
                .attr('name', "user_id[]")
                .attr('value', value)
                .appendTo('#frm_new');
        })
    })
    </script>
<?php } ?>