<?php
require APPPATH.'libraries/jwt/JWT.php';
require APPPATH.'libraries/jwt/Key.php';
require APPPATH.'libraries/jwt/SignatureInvalidException.php';
require APPPATH.'libraries/jwt/ExpiredException.php';
USe Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\ExpiredException;
class Jwt_validator{
    protected $CI;
    public function __construct(){
        $this->CI=& get_instance();
    }
    function create_token($data){

        $key="shdmahe2000mdhfryuvh125sdfhgrlaq";
        $date=time();
        $payload=array(
        "data"=>$data,
        "iat"=>$date,
        "exp"=>$date+36000
        );
        return JWT::encode($payload,$key,'HS256');
        }
public function verify_jwt(){
  $controller=   $this->CI->router->class;
  $method=  $this->CI->router->method;
if($controller=='login' && $method="isValidUser" || $controller=='Registration' && $method=='NewRegistration' || $controller=='Opening_Hours' || $controller=='Header_Menu'){

    

}else{
    $key="shdmahe2000mdhfryuvh125sdfhgrlaq";
    $jwt=$this->CI->input->get_request_header('Authorization',TRUE);

    if(!empty($jwt)){
try{

    $decoded=JWT::decode($jwt ,new Key($key, 'HS256'));
    $this->CI->hookData=$decoded;
   }catch(\Firebase\JWT\ExpiredException $e){
    $display = array(
    
        'msg' => $e->getMessage(),
        'status' => 401
    );
   $this->CI->output->set_content_type('application/json');
   $this->CI->output->set_status_header(401);            
   echo json_encode($display);
   exit;
   }catch(Exception $e){
  //  print_r($e);

    $display = array(
    
        'msg' => $e->getMessage(),
        'status' => 401

    );
   $this->CI->output->set_content_type('application/json');
   $this->CI->output->set_status_header(401);            
   echo json_encode($display);
       exit;
   }
}
else{
    $display = array(
        'msg' => "Please provide authorization header with key",
        'status' => 401
    );

    $this->CI->output->set_content_type("application/json");
    $this->CI->output->set_status_header(401);
    $this->CI->output->set_output(json_encode($display));

}
}

}
}