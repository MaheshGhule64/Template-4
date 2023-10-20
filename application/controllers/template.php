<?php

class Template extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('Template_Model', 'tm');
    }



    public function template_data(){


        $template_id = $this->input->get('id');
        $page_no = $this->input->get('page_no');
        $records_per_page = $this->input->get('records_per_page');
        $offset = ($page_no-1) * $records_per_page;
               
        if($template_id!='' && $page_no!='' && $records_per_page!=''){
               
             $template_data = $this->tm->get_template($template_id, $records_per_page, $offset);

             $total_records = $this->tm->get_total_records($template_id);
             $total_page = ceil($total_records/$records_per_page);
    
             if($template_data){
       
                $display = array(
                     'msg' => "Successfully retrive data",
                     'status' => 200,
                     'data' => $template_data,
                     'pagination'=>array(
                     'total_records' => $total_records,
                     'current_page' => $page_no,
                     'total_page' => $total_page,
                     'offset' =>$offset
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
                'msg' => "Please provide template id, page_no and records_per_page",
                'status' => 401
            );
    
                    $this->output->set_content_type('application/json');
                    $this->output->set_status_header(401);            
                    $this->output->set_output(json_encode($display));
    
        }
   
    }
    

    public function new_template_category(){


        $data=file_get_contents("php://input");         
               
        $this->tm->insert_template_category(json_decode($data, true));
                              
    }


public function new_template(){   

    $data=file_get_contents("php://input");         
           
    $this->tm->insert_template(json_decode($data, true));                          

}


public function update_template_category(){


    $data=file_get_contents("php://input");   
    $decode_data = json_decode($data, true);
    $category_name = $decode_data['category_name'];    
           
    $this->tm->template_category($category_name, $decode_data);
                          
}



public function update_template(){

    $data=file_get_contents("php://input");   
    $decode_data = json_decode($data, true);
    $template_id = $decode_data['id'];
           
    $this->tm->template($template_id, $decode_data);

}

}

