<?php

class website extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Website_Model', 'wm');

    }


    public function websiteData(){


             $result = $this->hookData;
             $user_id = $result->data[0]->user_id;
             $page_no = $this->input->get('page_no');
             $records_per_page = $this->input->get('records_per_page');
             $offset=($page_no-1)*$records_per_page;

             if($page_no!='' && $records_per_page!=''){ 
    
             $wb_data = $this->wm->getWebsiteData($user_id,$records_per_page,$offset);

             $total_records = $this->wm->get_total_record($user_id);
             $total_page = ceil($total_records/$records_per_page);           

    
            if($wb_data){
    
                $display = array(
                    'msg' => "Successfully retrive data",
                    'status' => 200,
                    'wb_name' => $wb_data,
                    'pagination'=>array(
                        'total_records'=>4,
                        'current_page'=>$page_no,
                        'total_page'=>10,
                        'offset'=>$offset
                    )
                );
    
    
                $this->output->set_content_type('application/json');
                $this->output->set_status_header(200);           
                $this->output->set_output(json_encode($display));
            }
            else{
    
                $display = array(
    
                    'msg' => 'Record not found',
                    'status' => 401
    
                );
                $this->output->set_content_type('application/json');
                $this->output->set_status_header(401);            
                $this->output->set_output(json_encode($display));
            }
        }
        else{

            $display = array(
                'msg' => "please provide page_no and records_per_page",
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(401);           
            $this->output->set_output(json_encode($display));
        }
        
    }


    public function website_update(){
    
         $result = $this->hookData;
         $user_id = $result->data[0]->user_id;
         $data = file_get_contents("php://input");
         $decode_data = json_decode($data,true);
         $website_id = $decode_data['website_id'];
    
         $this->wm->website($user_id, $website_id, $decode_data);
    
    }

    public function new_website(){
        
        
        $result = $this->hookData;
        $user_id = $result->data[0]->user_id;
        $website_id = $this->input->post('website_id');
        $website_name = $this->input->post('website_name');
        $_POST['user_id'] = $user_id;

        $this->wm->insert_new_website($this->input->post());
       
       
}
}