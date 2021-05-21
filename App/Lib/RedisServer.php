<?php 
namespace App\Lib;
class RedisServer
{
    protected $redis_con;
    protected $db;
    function __construct($host,$port,$pass) {
            $this->redis_con = new \Redis(); 
            $this->redis_con->connect($host, $port);
            $this->redis_con->auth($pass);
            
    }
    public function runStatus(){
        echo "Server is running: ".$this->redis_con->ping();
    }
    public function loadUsersData(MySQLDB $db){
        $this->db = $db;
        $datas = $this->db->query('SELECT * FROM `users`', false);
        foreach($datas as $data)
            $this->redis_con->set( $data['username'], json_encode($data));
        return $this->redis_con;
    }

    function getValueFromKey( $key ){ 
        $data = $this->redis_con->get($key);
        if(!empty($data)){
            return (array)json_decode($data);
        }
        return false; 
    }



}