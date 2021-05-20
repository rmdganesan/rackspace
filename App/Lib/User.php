<?php 
namespace App\Lib;
class User
{
    protected $db;
    public function __construct(MySQLDB $db)
    {
        $this->db = $db;
    }
    public function logincheck($userName, $password) {
        $status = false;
        $message = null;
        $data = $this->db->query('SELECT * FROM `users` WHERE username = '."'".$userName."'");
        
        if(empty( $data)) {
            $message = 'incorrect email or username';
        }elseif(!empty( $data) && $data['status'] !== 'enabled'){
            $message = 'your account has been disabled please see your system administrator';
        }
        elseif(password_verify($password, $data['password'])){
            $status = true;
            $message = 'your login was successful';
            session_start(); 
            $_SESSION["first_name"] =$data['first_name'];
            $_SESSION["last_name"] = $data['last_name'];
            $_SESSION["active"] = true;
        }else{
           
            $message = 'Password incorrect ';
        }

     return ['status' => $status, 'message'=> $message];
    }

    function fetchUsers(){
        return $this->db->query("SELECT * FROM test");
    }
    
}