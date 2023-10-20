<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('UserLogin_Model', 'um');
        $this->load->library('jwt_validator');
    }

    
	public function isValidUser()
	{
		$username = $this->input->post('username');
        $password = $this->input->post('password');
      

        if($username!='' && $password!=''){

            
        $data = $this->um->getUserData($username, $password);
        //print_r($data);
        if($data){

            $token = $this->jwt_validator->create_token($data);
            $arr = array(
                'msg' => "Successfully Logged in",
                'status' => 200,
                'token' => $token
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);            
            $this->output->set_output(json_encode($arr));
            

        }
        else{

            $arr = array(
                'msg' => "please enter valid username and password",
                'status' => 401,
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(401);            
            $this->output->set_output(json_encode($arr));

        }

        }
        else{
            $display = array(
                'msg' => "First fill username and password",
                'status' =>  401
            );
            $this->output->set_content_type('application/json');
            $this->output->set_status_header(401);            
            $this->output->set_output(json_encode($display));
            
        }
		
	}

}
