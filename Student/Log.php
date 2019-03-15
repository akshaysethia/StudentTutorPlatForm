<?php
    $name = filter_input(INPUT_POST, 'Username');
    $pass = filter_input(INPUT_POST, 'password');
    $shit = "Wrong Username Or Password";

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "srm";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($name,$pass)){

        $result1 = mysql_query("SELECT regno FROM student WHERE username = '".$name."'");
        $result2 = mysql_query("SELECT username FROM student WHERE password = '".$pass."'");

        if($name == $result1 && $pass == $result2){
            require_once("index.html");
        }
        else{
            echo "<script type='text/javascript'>alert('$shit');</script>";
            sleep(10);
            require_once)("Student-log.html");
        }
    }

    $conn->close();
?>