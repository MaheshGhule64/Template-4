<?php

class Gallery extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Gallery_Model');
    }


    public function validation(){

        $display = array(

            'msg' => "Please provide id to get gallery html",
            'status' => 401
        );

        
        $this->output->set_content_type("application/json");
        $this->output->set_status_header(401);
        $this->output->set_output(json_encode($display));
    }


    public function validation1(){

        $display = array(

            'msg' => "Please provide restaurant_id to get gallery image_url",
            'status' => 401
        );

        
        $this->output->set_content_type("application/json");
        $this->output->set_status_header(401);
        $this->output->set_output(json_encode($display));
    }

    public function gallery_html($id){

        $html = $this->Gallery_Model->get_gallery_html($id);

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


    public function image_url($restaurant_id){

        $image_url = $this->Gallery_Model->get_image_url($restaurant_id);

        if($image_url){

            $display = array(
                'msg' => "Images successfully retrive",
                'status' => 200,
                'data' => $image_url
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