<?php

class Deals_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function get_html($id){

        $query = $this->db->select('html, css')->from('tbl_our_deals_html')->where('id', $id)->get();

        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return 0;
        }
    }


    public function get_menu_details($restaurant_id){
     

        $query = $this->db->select('tbl_menu_items.restaurant_id, tbl_menu_items.menu_item_name, tbl_menu_items.menu_image, tbl_menu_items.menu_item_price, tbl_menu_items.menu_item_description_1, tbl_main_categories.main_category_name_english')->from('tbl_menu_items')->join('tbl_main_categories', 'tbl_main_categories.main_category_id = tbl_menu_items.menu_main_category_id', "RIGHT")->where('tbl_menu_items.restaurant_id', $restaurant_id)->get();

       if($query->num_rows()>0){

        return $query->result();
       } 
       else{
        return 0;
       }

       
    }
}