<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include "db.php";
    $sql = "select * from book";
    $result = $mysqli->query($sql);
    echo "<table border='1'>"; 
    $head =   array("ลำดับ","รหัสหนังสือ","ชื่อหนังสือ","ประเภทหนังสือ",
                    "สถานะหนังสือ","สำนักพิมพ์","ราคาหนังสือ","ราคาเช่าหนังสือ",
                    "จำนวนวัน","รูปภาพ","วันที่ซื้อ"); 
    echo "<tr>";
    foreach( $head as $value){
        echo "<th>{$value}</th>";
    }
    echo "</tr>";

    if ($result->num_rows > 0) {
        $a = 1;
        while($rows = $result->fetch_assoc()) {
            echo "<tr><td>{$a}</td>";
            foreach($rows as $k => $v){
                if($k=='TypeID ') echo "<td>".CheckType($mysqli,$v)."</td>";
                else if($k=='StatusID') echo "<td>".CheckStatus($mysqli,$v)."</td>";
                else if($k=='Picture') echo "<td>N/A</td>";
                else echo "<td>{$v}</td>";            
            }
            echo "<td><a href= "">edit</a></td>"
            echo "</tr>\n";
            $a++;
        } 
        echo "</table>";
    }else {
        echo "0 results";
    }
    $mysqli->close();
    
    function CheckType( $conn, $code) {
        $sqltxt = "SELECT * FROM typebook";
        $result = $conn->query($sqltxt);
        while($rs1 = $result->fetch_array()){
            if ($rs1[0] == $code) return $rs1[1];
        }
        return "";
    }
    
    function CheckStatus( $conn, $code) {
        $sqltxt = "SELECT * FROM statusbook";
        $result = $conn->query( $sqltxt );
        while ( $rs2 = $result->fetch_array() ){
        if ($rs2[0] == $code) return $rs2[1];
        }
        return "";
    }
    

?>
</body>
</html>
