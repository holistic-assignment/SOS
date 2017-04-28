<?php
function build_datetime_query($params,$id){
    $result = array();
    foreach($params as $key=>$value){
        if(check_word($key)){
            unset($params[$key]);
            $result = array_merge($result,build_query($key,$value));
        }
    }

      return $id == 0 ?  $result: $params;
}

function build_query($key , $value){
    $param = array();
    if(strpos($key,"_start")){
         $param[substr($key,0,strpos($key,"_start"))." >"] = $value;
        return $param;
    }
    if(strpos($key,"_end")){
        $param[substr($key,0,strpos($key,"_end"))." <"] = $value;
        return $param;
    }

}


function check_word($key){
    foreach (DATE_TIME_FIELD as $value){
        if(strpos($key,$value)!== FALSE){
            return true;
        }
    }
    return false;
}