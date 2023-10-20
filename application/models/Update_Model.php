<?php

class Update_Model extends CI_Model{

    public function __construct(){
        parent::__construct();


    }

    public function profile($user_id, $data){

        
         $query = $this->db->where('user_id', $user_id)->update('tbl_user_profile', $data);

         if($query){

            $display = array(

                'status' => 200,
                'msg' => "Your Profile Successfully Updated",
                
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));

            

         }
         else{

            $display = array(
                'msg' => "Profile not Updated",
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }

         
    }

    public function get_update_percentage($user_id){

        $sql = "SELECT COUNT('*') as number FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='tbl_user_profile'";

        $total_field = $this->db->query($sql);
        $row=$total_field->row();
        $number=$row->number;
       // print_r($total_field->row()->number);

         $data = $this->db->SELECT('*')->FROM('tbl_user_profile')->WHERE('user_id', $user_id)->get();

       
        // $query = $this->db->select('*')
        // ->from('INFORMATION_SCHEMA.COLUMNS')
        // ->where(array('TABLE_NAME'=> 'tbl_user_profile'))
        // ->get();

        // print_r($query->result());
        $index_array = array();
        $i = 0;
    
        foreach($data->result_array() as $row){

            foreach($row as $key=> $value){

            $index_array[$i] = $value;
            $i++;
        }
        }
       
        $size = count($index_array);
        $total_field = $size;
        $filled_field = 0;
        $empty_field = 0;

        for($j=0; $j<$size; $j++){
            if(!empty($index_array[$j])){
                $filled_field++;
            }
            else{
                $empty_field++;
            }
        }

        $arr = array(
            'total_field' => $total_field,
            'filled_field' => $filled_field,
            'empty_field' => $empty_field
        );

        return $arr;
    }

   

    public function password($user_id, $new_password){

        $query = $this->db->where('user_id', $user_id)->update('tbl_user_profile', $new_password);

        if($query){
            $display = array(
                'msg' => "Password updated Successfully",
                'status' => 200
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
         else{

            $display = array(
                'msg' => "password not Update",
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
    }
}