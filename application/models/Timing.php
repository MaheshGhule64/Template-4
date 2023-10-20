<?php

class Timing extends CI_Model{

    public function __construct(){
        parent::__construct();
    }


    public function timing_data($restaurant_id){

        $query = $this->db->Select('restaurant_id,timing_start,timing_end,timing_close ,GROUP_CONCAT(timing_day order by FIELD(timing_day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")) as day')->from('tbl_timings')->Where(array('restaurant_id'=> $restaurant_id, 'timing_close'=> "open" ))->group_by('timing_start,timing_end,restaurant_id,timing_close')->get();
        $query1 = $this->db->Select('restaurant_id,timing_start, timing_end,timing_close ,GROUP_CONCAT(timing_day order by FIELD(timing_day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")) as day')->from('tbl_timings')->Where(array('restaurant_id'=> $restaurant_id, 'timing_close'=> "close" ))->group_by('timing_close')->get();
        
        $result = [];
        if($query->num_rows()>0){
            $result = array_merge($result, $query->result_array());
        }
        if($query1->num_rows()>0){

        
            $result =array_merge($result, $query1->result_array());

        }
        
        return $result;

    }


    public function get_html($id){

        $query = $this->db->select('html, css')->from('tbl_opening_hours_templates')->where('id', $id)->get();

        
       if($query->num_rows()){
            return $query->result();
        }
        else{
            return 0;
        }
    }
}