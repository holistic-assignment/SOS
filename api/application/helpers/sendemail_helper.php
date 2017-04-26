<?php


if(!function_exists('sendMail')){
    function sendMail($title,$message){
        $ci =& get_instance();
        $ci->load->library(array('email'));
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'baby.voi1996@gmail.com';
        $config['smtp_pass'] = 'NGuyen1992';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        $config['validation'] = TRUE;
        $config['wordwrap'] = FALSE;
        $ci->email->initialize($config);
        $ci->email->from('nguyen', 'Nguyen Tran');
        $ci->email->to('baby.voi1995@gmail.com');
        $ci->email->subject($title);
        $ci->email->message($message);
        if ( $result=$ci->email->send()) {
            $ci-> response_message("send mail successful", SUCCESS_CODE, 1);
        } else {
            $ci->email->print_debugger();
            $ci-> response_message($ci->message('E013_ERROR'), 'E013');
        }
    }
}