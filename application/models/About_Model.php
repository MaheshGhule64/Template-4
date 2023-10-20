<?php

class About_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function get_resta_contacts($restaurant_id){

        $query = $this->db->Select('restaurant_address, restaurant_number, restaurant_email')->from('tbl_restaurants')->where('restaurant_id', $restaurant_id)->get();

        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return 0;
        }
    }

    public function get_contact_html($id){

        $query = $this->db->select('html')->from('tbl_about_us_contact')->where('id', $id)->get();

        if($query){

            return $query->result();
        }
        else{
            return 0;
        }
    }
}