<?php

class Contact_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }


    public function get_html($id){

        $query = $this->db->Select('html')->from('tbl_contact_us')->Where('id', $id)->get();

        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return 0;
        }
    }
}