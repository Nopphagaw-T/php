<?php
    class db{
        private $db;
        private $debug;
        function __construct($user, $pass, $dbname, $debug){
            $this->db = new mysqli("localhost",$user, $pass, $dbname);
            $this->debug = $debug;
            $this->db->set_charset("utf8");
            if($this->db->connect_errno){
                echo "Fail to connect to MySQL:".
                     $this->db->connect_error;
                exit();
            }
            else $this->debug_text("Connect Success"); 
        }
        function query($sql){
            $result = $this->db->query($sql);
            $this->debug_text($sql);
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return $data;
        }
        function debug_text($text){
            if($this->debug){
                echo "Debug: {$text}<br>";
            }
        }
        function close(){ $this->db->close(); } 
    }
    
    //$mydb = new db("root","", "person_data", true);
    //$data = $mydb->query("select * from person");
    //print_r($data);
?>