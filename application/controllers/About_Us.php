<?php

class About_Us extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('About_Model');
    }


    public function validation(){

        $display = array(
            'msg' => "Please Provide restaurant_id",
            'status' => 401
        );

        $this->output->set_content_type('appliacation/json');
        $this->output->set_status_header(401);
        $this->output->set_output(json_encode($display));

    }

    public function validation1(){

        $display = array(
            'msg' => "Please Provide id to get html",
            'status' => 401
        );

        $this->output->set_content_type('appliacation/json');
        $this->output->set_status_header(401);
        $this->output->set_output(json_encode($display));

    }
    public function resta_contact($restaurant_id){

        $details = $this->About_Model->get_resta_contacts($restaurant_id);

        if($details){

            $display = array(
                'msg' => "Data Retrieve Successfully",
                'status' => 200,
                'data' => $details
            );

            $this->output->set_content_type('appliacation/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));

        }
        else{

            $display = array(
                'msg' => "Data Not Found",
                'status' => 401
            );

            $this->output->set_content_type('appliacation/json');
            $this->output->set_status_header(401);
            $this->output->set_output(json_encode($display));
        }
    }


    public function contact_html($id){

        $html = $this->About_Model->get_contact_html($id);

        if($html){

            $display = array(
                'msg' => "Data Retrieve Successfully",
                'status' => 200,
                'data' => $html
            );

            $this->output->set_content_type('appliacation/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
        }
        else{

            $display = array(
                'msg' => "Data Not Found",
                'status' => 401
            );

            $this->output->set_content_type('appliacation/json');
            $this->output->set_status_header(401);
            $this->output->set_output(json_encode($display));

        }
    }
}