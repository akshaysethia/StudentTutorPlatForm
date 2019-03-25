<?php
    $name = filter_input(INPUT_POST, 'username');
    $sub = "Password For SRM IST E-Tutor Platform";
    $header = "From:akshaybhai98@gmail.com \r\n"; 
    $header .= "Content-type: text/html\r\n"; 

    $dbhost = "localhost";
    $dbname = "srm";
    $dbpass = "";
    $dbshit = "root";

    $conn = new mysqli($dbhost, $dbshit, $dbpass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($name)){
        $sql = "SELECT password FROM student WHERE email = '$name'";
    }

    if(isset($sql)){
        $msg = "<h1>SRM Institute of Science and Technology</h1>\n\n<h3>Student E-Tutor Platform</h3>\nPassword: ".$sql;
        $retval = mail ($name, $sub, $msg, $$header);
        if($retval == true){
            echo "<script>alert('Password Send To The Email<br>Check It And Login Again');</script>";
            sleep(10);
            require_once("Student-log.html");
        }
        else {
            echo "<script>alert('Error Sending Messages');</script>";
            exit;
        }
    }
    else {
        echo "No Such Email Is Present In The database<br>Either Try Again Or Register First";
        sleep(10);
        require_once("Student-log.html");
    }

    $conn->close();
?>