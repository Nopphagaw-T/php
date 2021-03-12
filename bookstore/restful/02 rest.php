<?php 
    include_once "01 dbcontrol.php";
    include_once "util.php";

    $debug_mode = false;

    if($_SERVER['REQUEST_METHOD']=='GET'){
        debug_text("for GET Method", $debug_mode);
        show_data($debug_mode);
    }else if($_SERVER['REQUEST_METHOD']=='POST'){
        debug_text("for POST Method", $debug_mode);
    }else{
        debug_text("Error Unknown this Request", $debug_mode);
        http_response_code(405);
    }
    function show_data($debug_mode){
        $mydb = new db("root", "", "test", $debug_mode);
        echo json_encode($mydb->query("select * from customer"));
        $mydb->close();
    }
?>