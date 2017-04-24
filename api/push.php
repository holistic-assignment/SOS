<?php
$str = "curl -XPOST -H 'Content-Type: application/x-www-form-urlencoded' -d 'token=%242y%2410%24pLs6aPNY1UL%2FSLc5s4eXqeNXVVh8.emWxImGuowRykahf3lY7oxbW&lat=10.77281690274683&lng=106.6812111739703&battery=50' 'http://localhost/api/index.php/users/checkDanger'";
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, base_url()."index.php/users/checkDanger");
//            curl_setopt($ch, CURLOPT_POST, true);
//            curl_setopt($ch, CURLOPT_HTTPHEADER, getHeaders());
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
//            $result = curl_exec($ch);
//            if ($result === false) {
//                throw new Exception(curl_error($ch));
//            }
//
//            curl_close($ch);
exec($str);
