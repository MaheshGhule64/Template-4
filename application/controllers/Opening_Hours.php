<?php

class Opening_Hours extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('Timing');
    }

    public function validation(){

        $display = array(
            'msg' => "Please provide restaurant_id",
            'status' => 401
        );

        $this->output->set_content_type('application/json');
        $this->output->set_status_header(401);
        $this->output->set_output(json_encode($display));
    }


    public function validation1(){

        $display = array(
            'msg' => "Please provide template name",
            'status' => 401
        );

        $this->output->set_content_type('application/json');
        $this->output->set_status_header(401);
        $this->output->set_output(json_encode($display));
    }
    public function get_resta_timing($restaurant_id=null){


            $result = $this->Timing->timing_data($restaurant_id);
            //print_r($result);

            if($result){

                $display = array(
                    'msg' => "Data Retrieve Successfully",
                    'status' => 200,
                    'data' => $result
                );

                

                $this->output->set_content_type('application/json');
                $this->output->set_status_header(200);
                $this->output->set_output(json_encode($display));

               
                //print_r($display['data'][0]['timing_close']);

            //    $closed_days = [];
              //  $open_days = [];

               /* for($i=0; $i<7; $i++){

                    if($display['data'][$i]['timing_close']=="close"){
                        $day = $display['data'][$i]['timing_day'];
                        array_push($closed_days, $day);
                    }
                    else{

                        $day = $display['data'][$i]['timing_day'];
                        array_push($open_days, $day);

                    }
                    
                }
*/
             /*   $arr_value_j = [];
                $allready_similar = [];
                //$similar = [];
                //$different = [];
                for($j=0; $j<count($open_days); $j++){
                    if(!(in_array($j, $allready_similar))){ 

                    array_push($arr_value_j, $j);                            

                    ${"similar" .$j} = [];

                    $day = $display['data'][$j]['timing_day'];
                    array_push(${"similar" .$j}, $day);

                    for($k=$j+1; $k<count($open_days); $k++){
                        $timing1_start = $display['data'][$j]['timing_start'];
                        $timing1_end = $display['data'][$j]['timing_end'];
                        $timing2_start = $display['data'][$k]['timing_start'];
                        $timing2_end = $display['data'][$k]['timing_end'];
                         
                        if($timing1_start == $timing2_start && $timing1_end == $timing2_end && !(in_array($k, $allready_similar))){

                            $day1 = $display['data'][$k]['timing_day'];
                            array_push(${"similar" . $j}, $day1);
                            array_push($allready_similar, $k);                                                        
                            
                        }
                    }
                }
                }*/

               // print_r($closed_days);
               // print_r($open_days);
             //  $checking = array(Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday);

            /*  $arr1 = ${"similar" . $arr_value_j[0]};
              $arr2 = ${"similar" . $arr_value_j[1]};*/
              //$time1 = $display['data'][$]['timing_start'];


            /*  for($idx = 0; $idx<count($arr_value_j); $idx++){

                print_r(${"similar" . $arr_value_j[$idx]});
              }

              */

            
            
           /* $show = array(
                //'similar' => $similar,
                //'different' => $different,
                'close' => $closed_days

            );

            $this->output->set_output(json_encode($show));*/


                
            }
            else{

                $display = array(
                    'msg' => "Data not found",
                    'status' => 401
                );

                $this->output->set_content_type('application/json');
                $this->output->set_status_header(401);
                $this->output->set_output(json_encode($display));

            }
        }




        public function html_tbl($id){

            $html = $this->Timing->get_html($id);


            if($html){

                $display = array(
                    'msg' => "Data Retrieve Successfully",
                    'status' => 200,
                    'data' => $html
                );

                

                $this->output->set_content_type('application/json');
                $this->output->set_status_header(200);
                $this->output->set_output(json_encode($display));

        }
        else{


            $display = array(
                'msg' => "Data not found",
                'status' => 401
            );

            $this->output->set_content_type('application/json');
            $this->output->set_status_header(401);
            $this->output->set_output(json_encode($display));

        }
        
    }
}