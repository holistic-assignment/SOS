<?php $constant = constant('HIDDEN_'.strtoupper(singular($controller)).'_VIEW');?>
<div class="container-fluid marT10">
    <div class="row-fluid">
        <form action="<?php echo base_url("index.php/$controller/update") ?>" method="post" id="frm_edit">
            <table class="table-striped" cellpadding="1" cellspacing="1">
                <tbody>
                <input type="hidden" name="id" value="<?php echo $obj['id']['value'] ?>">
                <?php foreach ($obj as $key => $value) { ?>
                    <?php if (!in_array($key, $constant)) { ?>
                        <tr style="line-height: 30px;min-height: 30px;height: 30px;">
                            <th style="width: 100px;background-color: #ECECEC"><?php echo $key ?></th>
                            <td style="width: 530px;min-width: 530px;max-width: 530px">
                                <?php if ($value['type'] == 'DATE_TAG') {
                                    edti_date_tag($key, $value['value']);
                                } else if ($value['type'] == 'SELECT_TAG') {
                                    select_tag_type($key);
                                } else { ?>

                                    <?php textbox_for($key, $value['value']); ?>

                                <?php } ?>
                            </td>
                        </tr>
                    <?php } else {
                        textbox_for($key, $value['value'], "hidden");
                    } ?>
                <?php } ?>
                </tbody>
            </table>
            <input style="margin-top: 10px" class="btn btn-default" type="submit" value="Update"
                   class="btn btn-default">

            <button style="margin-top: 10px" class="btn btn-default" onclick="goBack()">Go Back</button>
        </form>
    </div>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>
