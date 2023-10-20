<?php

class Registration extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('UserLogin_Model', 'um');

    }

    public function NewRegistration(){

        

        //$this->form_validation->set_rules('user_id', 'User_id','required|numeric');
        $this->form_validation->set_rules('user_name', 'Username','required|alpha');
        $this->form_validation->set_rules('user_email', 'Email','required|valid_email');
        $this->form_validation->set_rules('user_password', 'Password','required|max_length[12]');
        //$this->form_validation->set_rules('password_conform', 'Password_Conform','required|matches[password]');

        //$user_id = $this->input->post('user_id');
        $user_name = $this->input->post('user_name');
        $user_email = $this->input->post('user_email');
        $user_password = $this->input->post('user_password');
        //$password_conform = $this->input->post('password_conform');
        
        if($this->form_validation->run()){
            $display = array(
                'msg' => "Registration Successfull",
                'status' => 200
            );

            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($display));


           // $data=file_get_contents("php://input");      
            
            $this->um->insert_new_user($this->input->post());



        }
        else{

             
            $display = array(
                'msg' => str_replace(array("\r","\n"),'',strip_tags(validation_errors())),
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($display));
        }


        
    }
}