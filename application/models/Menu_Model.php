<?php


class Menu_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function get_menu_data($website_id){

        $query = $this->db->select('wb_page_menu.menu_name, wb_page_menu.website_id, wb_page_menu.page_or_link, wb_page_menu.link as menu_link, GROUP_CONCAT(wb_page_sub_menu.link) as sub_menu_link, GROUP_CONCAT(wb_page_sub_menu.page_or_link) as page_link_sub_menu ,GROUP_CONCAT(wb_page_sub_menu.sub_menu_name) as sub_menu')->from('wb_page_menu')->join('wb_page_sub_menu', 'wb_page_sub_menu.menu_id = wb_page_menu._id', "LEFT")->where('wb_page_menu.website_id', $website_id)->group_by('menu_name')->get();


        if($query->num_rows()>0){

            return $query->result();
        }
        else{

            return 0;
        }
    }


    public function get_header_html($id){

        $query = $this->db->select('html, css')->from('tbl_menu_html')->where('id', $id)->get();

        if($query->num_rows()){

            return $query->result();
        }
        else{

            return 0;
        }
    }
}