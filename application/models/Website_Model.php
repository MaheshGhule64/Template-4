<?php

class Website_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }


    public function getWebsiteData($user_id,$limit,$offset){

        $query = $this->db->select('website_id, website_name')
                          ->from('wb_website_details')
                          //->where('user_id', $user_id)
                          ->limit($limit,$offset)
                          ->get();


        
       if($query->num_rows()>0){

        return $query->result();
       }
       else{
        return 0;
       }
    }

    public function get_total_record($user_id){

        $this->db->from('wb_website_details'); 
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results();
    }



    public function insert_new_website($data){

        //$sql = "INSERT INTO wb_website_details ('website_id', 'website_name', 'user_id') VALUES($website_id, $website_name, $user_id)";
        /*$data = array(
            'user_id' =>  $user_id,
            'website_id' => $website_id,
            'website_name' => $website_name
        );*/

        $query = $this->db->insert("wb_website_details", $data);

        if($query){

            $display = array(
                'msg' => "Data successfully insert",
                'status' => 200
            );

           
            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);            
            $this->output->set_output(json_encode($display));
        }
        else{

            $display = array(
                'msg' => "Data not inserted",
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(401);            
            $this->output->set_output(json_encode($display));
        }
    }


    public function website($user_id, $website_id, $data){

        $query = $this->db->where(array('user_id'=> $user_id, 'website_id'=> $website_id))->update('wb_website_details', $data);

        if($query){
            $display = array(
                'msg' => "Your website update Successfully",
                'status' => 200
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
         else{

            $display = array(
                'msg' => "website not Updated",
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
    }

}