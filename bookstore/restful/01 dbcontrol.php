<?php
    class db{
    private $db;        
    private $debug;
    function __construct($user, $pass, $dbname, $debug){
        $this->debug = $debug;
        $this->db = new mysqli("localhost", $user, $pass, $dbname);
        $this->db->set_charset("utf8");
        if ($this->db->connect_errno){             // Check connection
            echo "Failed to connect to MySQL: " . 
                 $this->db->connect_error;
            exit();
        }else{
            $this->debug_text("Conect Success...");
        } 
    }
    function query($sql){
        $result = $this->db->query($sql);
        $this->debug_text($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        // $this->debug_text(print_r($data));
        return $data;
    }
    function debug_text($text){
        if($this->debug){ 
            #if true debug text on for track any 
            echo "Debug :{$text}<br>";
        } 
    }
    function close(){ $this->db->close(); }
    }

    #$mydb = new db("root", "", "test", false);

?>