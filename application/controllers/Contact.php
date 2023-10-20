<?php

class Contact extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Contact_Model');
    }

    public function validation(){

        $display = array(

            'msg' => "Please provide id to get contact html",
            'status' => 401
        );

        
        $this->output->set_content_type("application/json");
        $this->output->set_status_header(401);
        $this->output->set_output(json_encode($display));
    }

    public function contact_html($id){

        $html = $this->Contact_Model->get_html($id);

        if($html){

            $display = array(
                'msg' => "Data successfully retrive",
                'status' => 200,
                'data' => $html
            );

            $this->output->set_content_type("application/json");
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
        }
        else{
            $display = array(
                'msg' => "Data not found",
                'status' => 401
            );

            $this->output->set_content_type("application/json");
            $this->output->set_status_header(401);
            $this->output->set_output(json_encode($display));
        }
    }
}