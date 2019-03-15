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

        $result1 = mysql_query("SELECT regno FROM tutor WHERE username = '".$name."'");
        $result2 = mysql_query("SELECT username FROM tutor WHERE password = '".$pass."'");

        if($name == $result1 && $pass == $result2){
            require("");
        }
        else{
            echo "<script type='text/javascript'>alert('$shit');</script>";
        }
    }

    $conn->close();
?>