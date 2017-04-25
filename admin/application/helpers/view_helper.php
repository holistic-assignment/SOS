<?php
function textbox_for($name="nguyen"){

   echo '<input type="text" name="'.$name.'"
                               style="width:164px;height:30px;padding: 4px 6px;margin-top: 10px">';
}

function select_tag (){
    echo '<select class="form-control" id="sel1" style="width:164px;height:30px;padding: 4px 6px;margin-top: 10px">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>';
}