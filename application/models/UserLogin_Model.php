<?php


class UserLogin_Model extends CI_Model{

    public function getUserData($username, $password){
       $query = $this->db->select('user_name,user_id')
                ->from('tbl_user_profile')
                ->where(array('user_name'=> $username, 'user_password'=> $password))
                ->get();

                //print_r($query);
       
       if($query->num_rows()>0){
       
            return $query->result();

        }

          //print_r(json_encode($placeholer));
       
       else{
        return 0;
       }
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

    

    public function getPageData($website_id, $limit, $offset){

        $query = $this->db->Select('*')
                          ->from('wb_page_details')
                          ->where('website_id', $website_id)
                          ->limit($limit, $offset)
                          ->get();

        if($query->num_rows()>0){

            return $query->result();
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
    public function insert_new_user($data){

        // $data = array(
        //     'user_id' => $user_id,
        //     'user_name' => $username,
        //     'user_email' => $email,
        //     'user_password' => $pass
        // );

        //$sql = "INSERT INTO tbl_user_profile('user_id', 'user_name', 'user_email', 'user_password') VALUES($user_id, $username, $email, $pass)";
        $query = $this->db->insert("tbl_user_profile", $data);
        
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

   
    
}