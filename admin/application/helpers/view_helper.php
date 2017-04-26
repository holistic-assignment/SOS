<?php
function textbox_for($name = "nguyen")
{

    echo '<input type="text" name="' . $name . '"
                               style="width:164px;height:30px;padding: 4px 6px;margin-top: 10px">';
}


function select_tag_type($name){
    if($name == 'os'){
        select_tag('os',array('OS','Android'));
    }else if($name == 'del_flag'){
        select_tag('del_flag',array('Active','inactive'));
    }else if($name == 'publish_flag'){
        select_tag('publish_flag',array('publish','un-publish'));
    }else if($name == 'message_type'){
        select_tag('message_type',array('send message', 'call message'));
    }else if($name == 'env_flag'){
        select_tag('env_flag',array('production', 'sandbox'));
    }
}

function date_tag($name){
    $open_tag = "<div class=\"input-daterange input-group\" id=\"datepicker\">";
    $body_tag = "<input type=\"text\" class=\"input-sm form-control\" name=\"{$name}_start\" style=\"width:164px;height:30px;padding: 4px 6px;margin-top: 10px\" />
                  <span style=\"float: left; padding-top: 19px;\">&nbsp;～&nbsp;</span>
                 <input type=\"text\" class=\"input-sm form-control\" name=\"{$name}_end\"  style=\"width:164px;height:30px;padding: 4px 6px;margin-top: 10px\"/>";
    $end_tag = "</div>";
    echo $open_tag.$body_tag.$end_tag;
}

function select_tag($name,$resource = array())
{   $open_tag = '<select name="'.$name.'" class="form-control" id="sel1" style="width:164px;height:30px;padding: 4px 6px;margin-top: 10px">';
    $close_tag = '</select>';
    $body_tag = "";
    $i =0;
    foreach($resource as $value) {
        $body_tag .= "<option value=\"$i\">$value</option>";
       $i++;
    }
    echo $open_tag . $body_tag . $close_tag;
}