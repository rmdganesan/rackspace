<?php 
namespace App\Lib;
class MySQLDB
{
    protected $pdo;
    function __construct($host,$user,$pass,$data) {
        $dsn = "mysql:host=$host;dbname=$data;charset=utf8mb4";
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->pdo = new \PDO($dsn, $user, $pass, $options);
       } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
       }
    }

    public function query($query, $fetch = true)
    {
        $response = null;
        $res= $this->pdo->prepare($query);
        $res->execute();
        if($fetch == true) {
            $response = $res->fetch(\PDO::FETCH_ASSOC);
        }else {
            $response = $res->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $response;
    }
}