<?php 
    include_once "01 dbcontrol.php";
    include_once "util.php";

    $debug_mode = false;

    if($_SERVER['REQUEST_METHOD']=='GET'){
        debug_text("for GET Method", $debug_mode);
        echo json_encode(show_data($debug_mode));
        
    }else if($_SERVER['REQUEST_METHOD']=='POST'){
        debug_text("for POST Method", $debug_mode);
        if( isset($_POST["new_id"]) && isset($_POST["new_name"]) ){
            $new_id   = $_POST["new_id"];
            $new_name = $_POST["new_name"];
            insert_newdata($new_id, $new_name, $debug_mode);
            echo json_encode(show_data($debug_mode));
        }
    }else{
        debug_text("Error Unknown this Request", $debug_mode);
        http_response_code(405);
    }
    function show_data($debug_mode){
        $mydb = new db("root", "", "book", $debug_mode);
        $data = $mydb->sel_data("select * from user");
        $mydb->close();
        return $data;
    }
    function insert_newdata($new_id, $new_name, $debug_mode){
        $mydb = new db("root", "", "book", $debug_mode);
        $sql = "INSERT INTO user(id, name) VALUES ({$new_id},{$new_name})";
        $data = $mydb->query($sql);
        $mydb->close();
    }
?>