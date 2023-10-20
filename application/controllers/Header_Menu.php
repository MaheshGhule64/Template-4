<?php

class Header_Menu extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('Menu_Model');
    }


    public function validation(){


        $display = array(
            'msg' => "Please provide website_id",
            'status' => 401
        );

        $this->output->set_content_type("application/json");
        $this->output->set_status_header(401);
        $this->output->set_output(json_encode($display));

    }


    public function validation1(){


        $display = array(
            'msg' => "Please provide html id",
            'status' => 401
        );

        $this->output->set_content_type("application/json");
        $this->output->set_status_header(401);
        $this->output->set_output(json_encode($display));

    }
    public function menu_data($website_id){


        $menu_data = $this->Menu_Model->get_menu_data($website_id);

        if($menu_data){

            $display = array(
                'msg' => "Data Retrieve Successfully",
                'status' => 200,
                'data' => $menu_data
            );

            $this->output->set_content_type("application/json");
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
        }
        else{

            $display = array(
                'msg' => "Data Not Found",
                'status' => 401
            );

            $this->output->set_content_type("application/json");
            $this->output->set_status_header(401);
            $this->output->set_output(json_encode($display));
        }

    }

    public function header_html($id){

        $html = $this->Menu_Model->get_header_html($id);

        if($html){

            $display = array(
                'msg' => "Data Retrieve Successfully",
                'status' => 200,
                'data' => $html
            );

            $this->output->set_content_type("application/json");
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
        }
        else{

            $display = array(
                'msg' => "Data Not Found",
                'status' => 401
            );

            $this->output->set_content_type("application/json");
            $this->output->set_status_header(401);
            $this->output->set_output(json_encode($display));
        }
    }
}