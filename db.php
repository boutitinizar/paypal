<?php
/**
 * User: Nizar
 * Date: 06/11/2015
 * Time: 16:16
 */

class db {

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'paypal';
    public $db;

    public function __construct($host = null,$username= null,$password = null,$database = null){
     if($host != null){
         $this->host = $host;
         $this->username = $username;
         $this->password = $password;
         $this->database = $database;
     }
        try{
            $this->db = new PDO('mysql:host='. $this->host.';dbname='.$this->database,$this->username,$this->password, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING
            ));

        }catch (PDOException $e){
            die('<h1>Impossible de se connecter à la base de donnée</h1>');
        }
    }


    public function query($sql){
        $req = $this->db->prepare($sql);
        $req->execute();
        return $req->fetchALL(PDO::FETCH_OBJ);
   }



}