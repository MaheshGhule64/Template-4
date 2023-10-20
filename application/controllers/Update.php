<?php

class Update extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('Update_Model', 'um');
    }

    public function profile_update(){

        $result = $this->hookData;
        $user_id = $result->data[0]->user_id;        
        $putData=file_get_contents("php://input");                

        $this->um->profile($user_id, json_decode($putData,true));

}


public function password_update(){

    $result = $this->hookData;
    $user_id = $result->data[0]->user_id;
    $data = file_get_contents("php://input");
    $decode_data = json_decode($data,true);

    $this->um->password($user_id, $decode_data);

}

public function profile_update_percentage(){

    $result = $this->hookData;
    $user_id = $result->data[0]->user_id;
           
    $percentage_data = $this->um->get_update_percentage($user_id);

    $total_field = $percentage_data['total_field'];
    $filled_field = $percentage_data['filled_field'];
    $empty_field = $percentage_data['empty_field'];
    $percentage = ($filled_field/$total_field)*100;

    $show = array(
                
          'status' => 200,
          'msg' => "Your Profile " . round($percentage) . "% Updated",
          'total_field' => $total_field,
          'filled_field' => $filled_field,
          'empty_field' => $empty_field

        );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($show));


}

}



