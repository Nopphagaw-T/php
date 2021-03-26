<?php
    include_once("class.db.php");

    if($_SERVER["REQUEST_METHOD"]=='GET'){
        echo json_encode(show_product(),JSON_UNESCAPED_UNICODE);
    }else if($_SERVER["REQUEST_METHOD"]=='POST'){
        add_to_cart($_POST);
        //echo print_r($_POST);
    }

    function show_product(){
        $shop = new database();
        $shop->connect();

        $sql = "SELECT product.Product_id, product.Product_code, 
                       product.Product_Name,
		               brand.Brand_name, unit.Unit_name, 
                       product.Cost, product.Stock_Quantity
                FROM   product,brand,unit
                WHERE  product.Brand_ID = brand.Brand_id
                and    product.Unit_ID  = unit.Unit_id";

        $result = $shop->query($sql);
        $shop->close();
        return $result; 
    }

    function add_to_cart($post){
        if(isset($post['p_id'])&&isset($post['p_qty'])&&isset($post['cus_id'])){
            $shop = new database();
            $shop->connect();
            #check last po status if==1 open new else use exist
            $sql = "SELECT bill.Bill_id, bill.Cus_ID, bill.Bill_Status 
                    FROM bill 
                    WHERE bill.CUS_ID=1234 
                    order by Bill_id desc limit 1";
            $shop->exec($sql);
        }
    }
?>