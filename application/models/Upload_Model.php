<?php

class Upload_Model extends CI_Model{

    public function __construct(){

        parent::__construct();
    }

    public function image($user_id,$data){


        $insert_data = array(
            'user_id' => $user_id,
            'image_label' => $data['raw_name'],
            'image_img_url' => "http://localhost/uploads/image/".$data['file_name']
        );

        $query = $this->db->insert('wb_custom_images', $insert_data);
    }


    public function video($user_id,$data){


        $insert_data = array(
            'user_id' => $user_id,
            'video_label' => $data['raw_name'],
            'video_url' => "http://localhost/uploads/video/".$data['file_name']
        );

        $query = $this->db->insert('wb_custom_videos', $insert_data);
    }
}