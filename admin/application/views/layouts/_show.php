
<div class="container-fluid marT10">
    <div class="row-fluid">
        <form action="<?php echo base_url("index.php/$controller/edit") ?>" method="post" id="frm_edit">
            <table class="table-striped" cellpadding="1" cellspacing="1">
                <tbody>
                <?php foreach ($obj as $key => $value) { ?>
                    <tr style="line-height: 30px;min-height: 30px;height: 30px;">
                        <th style="width: 100px;background-color: #ECECEC"><?php echo $key ?></th>
                        <td style="width: 530px;min-width: 530px;max-width: 530px">
                            <?php echo $value ?>

                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <a style="margin-top: 10px" class="btn btn-default" href="<?php echo base_url()."index.php/$controller/edit?id=$obj->id"?>" role="button">Edit</a>
            <button style="margin-top: 10px" class="btn btn-default" onclick="goBack()">Go Back</button>
        </form>
    </div>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>
