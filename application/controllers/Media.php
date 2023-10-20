<?php

class Media extends CI_Controller{

    public function __construct(){

        parent::__construct();

        $this->load->model('Upload_Model', 'up');
        $this->load->library('ffmpeg');
    }

    public function image_upload(){
        $config['upload_path'] = FCPATH.'../uploads/image/';
        $config['allowed_types'] = 'jpg|gif|png';
        $config['max_size'] = '5000';
        $this->load->library('upload', $config);
       // $user_file = $this->input->post('user_file');
       //print_r(FCPATH);
       
        if($this->upload->do_upload('user_file')){
            $data = $this->upload->data();

            $config2['image_library'] = 'gd2';
            $config2['source_image'] = FCPATH.'../uploads/image/'. $data['file_name'];
          
            $config2['new_image'] = FCPATH.'../uploads/thumbs/' .  $data['file_name'];
            $config2['width'] = 400;
            $config2['height'] = 300;
            $config2['thumb_marker'] = '_thumb';
            $config2['maintain_ratio'] = TRUE;
            $config2['create_thumb'] = TRUE;

            


            $this->load->library('image_lib');
            $this->image_lib->initialize($config2);
            $this->image_lib->resize();
            $this->image_lib->clear();
            

            

            //print_r($data );
            $result = $this->hookData;
            $user_id = $result->data[0]->user_id;
            $this->up->image($user_id,$data);
            $display = array(
                'msg' =>"image successfully uploaded",
                'status' => 200                
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(200);
            $this->output->set_output(json_encode($display));

         
        }
        else{
            $display = array(
                'msg' => strip_tags($this->upload->display_errors()),
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(401);
            $this->output->set_output(json_encode($display));
        }
   // }
}


public function video_upload(){
    $config['upload_path'] = FCPATH.'../uploads/Videos/';
    $config['allowed_types'] = 'avi|mp4|3gp|mpeg|mpg|mov|mp3|flv|wmv';
    $config['max_size'] = '90000';
    $this->load->library('upload', $config);
   // $user_file = $this->input->post('user_file');
   // print_r($_FILES['user_file']['name']);

    if($this->upload->do_upload('user_file')){
        $data = $this->upload->data();

        $result = $this->hookData;
        $user_id = $result->data[0]->user_id;
        $this->up->video($user_id,$data);
        $display = array(
            'msg' =>"Video successfully uploaded",
            'status' => 200,
            'data' => $data
        );

        $this->output->set_content_type('application/json');
        $this->output->set_status_header(200);
        $this->output->set_output(json_encode($display));

        }
     
    
    else{
        $display = array(
            'msg' => strip_tags($this->upload->display_errors()),
            'status' => 401
        );

        $this->output->set_content_type('application/json');
        $this->output->set_status_header(401);
        $this->output->set_output(json_encode($display));
    }
// }
}
}