<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification{
    public function Authorization(){
        $CI =&get_instance();
        $CI->load->library('Jwt_validator');
        $CI->jwt_validator->verify_jwt();
    }
} 