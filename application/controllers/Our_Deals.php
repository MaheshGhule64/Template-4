<?php

class Our_Deals extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('Deals_Model', 'dm');
    }


    public function validation(){

        $display = array(
            'msg' => "Please Provide our deals id",
            'status' => 401
        );


            $this->output->set_content_type("application/json");
            $this->output->set_status_header(401);
            $this->output->set_output(json_encode($display));
    }


    public function validation1(){

        $display = array(
            'msg' => "Please Provide restaurant id",
            'status' => 401
        );


            $this->output->set_content_type("application/json");
            $this->output->set_status_header(401);
            $this->output->set_output(json_encode($display));
    }


    public function deals_html($id){

        $html = $this->dm->get_html($id);

        if($html){

            $display = array(
                'msg' => "Data Retrive Successfully",
                'status' => 200,
                'data' =>$html
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


    public function menu_details($restaurant_id){

       $data = $this->dm->get_menu_details($restaurant_id);

       if($data){

        $display = array(
            'msg' => "Data Retrieve Successfully",
            'status' => 200,
            'data' => $data
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