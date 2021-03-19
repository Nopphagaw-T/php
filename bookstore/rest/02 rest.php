<?php
    include_once "01 dbcontrol.php";
    include_once "util.php";
    $debug_mode = false;
    if($_SERVER['REQUEST_METHOD']=='GET'){
        echo json_encode(get_data($debug_mode));
    }else if($_SERVER['REQUEST_METHOD']=='POST'){
        text_debug("POST may be support next time<br>", $debug_mode);
        if(isset($_POST['u_id']) && isset($_POST['u_name'])){
           $u_id   = $_POST['u_id'];
           $u_name = $_POST['u_name'];
           insert_newdata($u_id, $u_name, $debug_mode);
           echo json_encode(get_data($debug_mode));
        }
    }else{
        http_response_code(405); // Error unsupport by current version
    }
    function get_data($debug_mode){
        $my_db = new db("book","1234","book",$debug_mode);
        $data = $my_db->query("select * from user");
        $my_db->close();
        return $data;
    }
    function insert_newdata($u_id,$u_name,$debug_mode){
        $my_db = new db("book","1234","book",$debug_mode);
        $sql = "INSERT INTO user(id, name) VALUES ({$u_id},'{$u_name}')";
        $result = $my_db->query_only($sql);
        $my_db->close();
        return result; 
    }
?>