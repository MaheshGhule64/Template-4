<?php


class Page extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Page_Model', 'pm');
       
    }


    public function page_data(){
        // $decoded=$this->hookData;
        // print_r($decoded);
     
            $result = $this->hookData;
            $user_id = $result->data[0]->user_id;
            $website_id = $this->input->get('website_id');
            $page_no = $this->input->get('page_no');
            $records_per_page = $this->input->get('records_per_page');
    
            if($website_id!='' && $page_no!='' && $records_per_page!=''){ 
            
            $offset = ($page_no-1) * $records_per_page;
            $page = $this->pm->getPageData($user_id, $website_id, $records_per_page, $offset);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
            $total_records = $this->pm->get_total_record($website_id);
            $total_page = ceil($total_records/$records_per_page);

        
    
            if($page){
    
                $display = array(
                    'msg' => "Successfully retrive page data",
                    'status' => 200,
                    'page' => $page,
                    'pagination'=>array(
                        'total_records'=> $total_records,
                        'current_page'=>$page_no,
                        'total_page'=>$total_page,
                        'offset'=>$offset
                    )
                );
    
    
                $this->output->set_content_type('application/json');
                $this->output->set_status_header(200);
                $this->output->set_output(json_encode($display));
            }
            else{
    
                $display = array(
    
                    'msg' => 'page not found',
                    'status' => 401
    
                );
                $this->output->set_content_type('application/json');
                $this->output->set_status_header(401);
                $this->output->set_output(json_encode($display));
            }
    
           }
            else{
    
                $display = array(
    
                    'msg' => "please provide website_id, page_no and records_per_page",
                    'status' => 401
                    
                );
    
                $this->output->set_content_type('application/json');
                $this->output->set_status_header(401);
                $this->output->set_output(json_encode($display));
            }
    
    }


    public function specific_page($page_id, $website_id){
        
        $result = $this->hookData;
        $user_id = $result->data[0]->user_id;
       // echo $user_id. "<br>";

        if($page_id!='' && $website_id != ''){ 
        $page_data = $this->pm->get_Specific_page($user_id, $page_id, $website_id);
        if($page_data){
            $display = array(
                'msg' => "Successfully retrive page data",
                'status' => 200,
                'page' => $page_data             
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));

        }
        else{
            $display = array(
    
                'msg' => 'page not found',
                'status' => 401,
            

            );
            $this->output->set_content_type('application/json');
            $this->output->set_status_header(401);
            $this->output->set_output(json_encode($display));
        }
    }
    else{
        $display = array(
    
            'msg' => "please provide website_id and  page_no",
            'status' => 401
            
        );

        $this->output->set_content_type('application/json');
        $this->output->set_status_header(401);
        $this->output->set_output(json_encode($display));
    }
    }


    public function page_update(){

     $result = $this->hookData;
     $user_id = $result->data[0]->user_id;                     
     $data = file_get_contents("php://input");
     $decode_data = json_decode($data,true);    
     $page_id = $decode_data['_id'];
    
     $this->pm->page($user_id, $page_id, $decode_data);
    
    } 

    public function new_page(){

    
        $result = $this->hookData;
        $user_id = $result->data[0]->user_id;
        $website_id = $this->input->post('website_id');
        $page_name = $this->input->post('name');
        $content = $this->input->post('content');
        $page_id = $this->input->post('_id');
        $slug = $this->input->post('slug');
        $_POST['user_id']=$user_id;

         $this->pm->insert_new_page($this->input->post());
                              
    

    }
}
