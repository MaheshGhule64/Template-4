<?php

class Page_Model extends CI_Model{



    public function __construct(){
        parent::__construct();
    }


    public function getPageData($user_id, $website_id, $limit, $offset){

        $query = $this->db->Select('*')
                          ->from('wb_page_details')
                          ->where(array('user_id' => $user_id, 'website_id' => $website_id))
                          ->limit($limit, $offset)
                          ->get();

        if($query->num_rows()>0){

            return $query->result();
        }           
        else{

            return 0;
        }
    }

    public function get_Specific_page($user_id, $page_id, $website_id){

        $query = $this->db->select('*')->from('wb_page_details')->where(array('website_id'=> $website_id, '_id'=>$page_id, 'user_id' => $user_id))->get();

        if($query->num_rows()>0){
            return $query->row();
        }
        else{
            return 0;
        }
    }

    public function get_total_record($website_id){

        $this->db->from('wb_page_details'); 
        $this->db->where('website_id', $website_id);
        return $this->db->count_all_results();
    }



    public function insert_new_page($data){

        /*$data = array(

            'user_id'=> $user_id,
            'website_id' => $website_id,
            'name' => $page_name,
            '_id' => $page_id,
            'content' => $content,
            'slug' => $slug
        );*/

        //print_r($data);

        $query = $this->db->insert("wb_page_details", $data);

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


    public function page($user_id, $page_id, $data){

        $query = $this->db->where(array('_id'=> $page_id, 'user_id'=> $user_id))->update('wb_page_details', $data);

        if($query){
            $display = array(
                'msg' => "Page updated Successfully",
                'status' => 200
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
         else{

            $display = array(
                'msg' => "page not Updated",
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
    }
}