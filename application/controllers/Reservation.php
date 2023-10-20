<?php

class Reservation extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Reservation_Model');
    }


    public function validation(){

        $display = array(
            'msg' => "Please Provide booking table id",
            'status' => 401
        );

        $this->output->set_content_type('application/json');
        $this->output->set_status_header(200);
        $this->output->set_output(json_encode($display));
    }
    public function book_table_html($id){

        $html = $this->Reservation_Model->get_table_html($id);

        if($html){

            $display = array(
                'msg' => "Data Retrieve Successfully",
                'status' => 200,
                'data' => $html
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
        }
        else{

            $display = array(
                'msg' => "Data Not Found",
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(401);
            $this->output->set_output(json_encode($display));
        }
    }
}