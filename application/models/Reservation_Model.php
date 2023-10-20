<?php

class Reservation_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }


    public function get_table_html($id){

        $query = $this->db->select('html')->from('tbl_booking_html')->where('id', $id)->get();

        if($query->num_rows()>0){

            return $query->result();
        }
        else{

            return 0;
        }
    }
}