<?php
namespace App\Lib;
class Shorty
{

    private $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    private $randomString = '';
    private $shost = 'http://rs.io/';
    protected $db;
    public $furl = null;
    public $surl = null;
    public function __construct(MySQLDB $db)
    {
        $this->db = $db;
    }
    private function generateRandomString($length = 6) {
        for ($i = 0; $i < $length; $i++) {
            $this->randomString .= $this->characters[rand(0, strlen($this->characters) - 1)];
        }
    }

    public function checkExsting($url, $type = 'furl'){
        if($type == 'furl'){
                $data = $this->db->query('SELECT * FROM `url_shortener` WHERE url  = '."'".$url."' LIMIT 0, 1");
        }else {
                $data = $this->db->query('SELECT * FROM `url_shortener` WHERE shortener = '."'".$url."' LIMIT 0, 1");
        }
        if(empty( $data)) {
            return false;
        }else{
            $this->furl = $data['url'];
            $this->surl = $data['shortener'];
            return true;
        }
        
    }
  
    public function newShorty($url) {
        $status = false;
        if($this->checkExsting($url, 'furl')){
            $status = false;
            $message = '<label style="color:green"> URL already exists in this Database <a style="text-decoration: underline;" href="'.$this->surl . '" target="_blank">'.$this->surl . '</a> <br> Full URL: '.$this->furl. '  </label>  ';
        }elseif($this->verify($url)){
            $this->generateRandomString();
            $this->surl = $this->shost.$this->randomString;
            $this->furl = $url;
            $this->db->query('INSERT INTO url_shortener (url,shortener) VALUES ('."'". $this->furl."','" .$this->surl ."')");
            $message = '<label style="color:green"> successfully created short url! <br> Shorty URL <a style="text-decoration: underline;" href="'.$this->surl . '" target="_blank">'.$this->surl . '</a> (Full URL: '.$this->furl. ')  </label>  ';
        }else {
            $message = 'Please provide valid URL ';
        }
        return ['status' => $status, 'message'=> $message, 'furl' => $this->furl, 'shortener' => $this->surl ];
    }

    public function getAll() {
       return  $this->db->query('SELECT * FROM `url_shortener`', false);
    }
    private function verify($url){
        if(!filter_var($url, FILTER_VALIDATE_URL)){
            return false;
        }
        $curlInit = curl_init($url);
        curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($curlInit,CURLOPT_HEADER,true);
        curl_setopt($curlInit,CURLOPT_NOBODY,true);
        curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
        $response = curl_exec($curlInit);
        curl_close($curlInit);
        return $response?true:false;
    }



    

}