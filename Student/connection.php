<?php
    $name = filter_input(INPUT_POST, 'username');
    $sub = "Password For SRM IST E-Tutor Platform";
    $header = 'From: dssailendra@techviewers.in' . "\r\n"; 

    $dbhost = "localhost";
    $dbname = "srm";
    $dbpass = "";
    $dbshit = "root";

    $conn = new mysqli($dbhost, $dbshit, $dbpass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($name) & !empty($name)){
        $sql = "SELECT password FROM student WHERE email = '$name'";
    }

    f($conn->query($sql)){
        $msg = "SRM Institute of Science and Technology\n\nStudent E-Tutor Platform\nPassword: ".$sql;
        mail($name, $sub, $msg, $header);
        echo "Password Send To The Email<br>Check It And Login Again";
        sleep(10);
        require_once("Student-log.html");
    }
    else {
        echo "No Such Email Is Present In The database<br>Either Try Again Or Register First";
        sleep(10);
        require_once("Student-log.html");
    }

    $conn->close();
?>