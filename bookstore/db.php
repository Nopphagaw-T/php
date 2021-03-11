<?php
    define("hostname","localhost");
    define("user","user");
    define("password", "VHiToiT8PmmWbaqn");
    define("dbname","bookstore");
?>

<?php
    $mysqli = new mysqli(hostname, user, password, dbname);
    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }else{
        echo "Connect successgg...";
    }
    $sqltxt = ""
?>