<?php

class Gallery_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function get_gallery_html($id){

        $query = $this->db->Select('html')->from('tbl_gallery_html')->Where('id', $id)->get();

        if($query->num_rows()>0){

            return $query->result();
        }
        else{

            return 0;
        }
    }


    public function get_image_url($restaurant_id){

        $query = $this->db->Select('image_name')->From('tbl_gallery_images')->Where('restaurant_id', $restaurant_id)->get();

        if($query->num_rows()>0){

            return $query->result();
        }
        else{

            return 0;
        }
    }
}