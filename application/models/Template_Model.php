<?php

class Template_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }


    public function get_template($template_id){

        $cat_id = $this->db->select('category_id')->from('wb_templates')->where('id', $template_id)->get()->row();

        //echo $cat_id->category_id;


        $this->db->select('wb_templates.*, wb_templates_category.category_name');
        $this->db->from('wb_templates');
        $this->db->join('wb_templates_category', 'wb_templates.category_id = wb_templates.category_id','Right');
        $this->db->where(array('id'=> $template_id, '_id'=>$cat_id->category_id));
        $query = $this->db->get();

        //print_r($query->result());
        if($query->num_rows()>0){

            return $query->result();
           }
           else{
            return 0;
           }
           
    }

    public function get_total_records($template_id){
        $this->db->from('wb_templates');
        $this->db->where('id', $template_id);
        return $this->db->count_all_results();

    }
    public function insert_template_category($data){

        $query = $this->db->insert("wb_templates_category", $data);

        if($query){
            $display = array(
                'msg' => "Template category added sucessfully",
                'status' => 200
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
         else{

            $display = array(
                'msg' => "Template category Not added",
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
    }


    public function insert_template($data){

        $query = $this->db->insert("wb_templates", $data);

        if($query){
            $display = array(
                'msg' => "Template sucessfully inserted",
                'status' => 200
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
         else{

            $display = array(
                'msg' => "Template Not inserted",
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
    }


    public function template_category($category_name, $data){

        $query = $this->db->where('category_name', $category_name)->update('wb_templates_category', $data);

        if($query){
            $display = array(
                'msg' => "Your template category update Successfully",
                'status' => 200
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
         else{

            $display = array(
                'msg' => "template category not Updated",
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
    }



    public function template($template_id, $data){

        $query = $this->db->where('id', $template_id)->update('wb_templates', $data);

        if($query){
            $display = array(
                'msg' => "Your template update Successfully",
                'status' => 200
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
         else{

            $display = array(
                'msg' => "template not Updated",
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));
         }
    }
}