<?php
    $name = filter_input(INPUT_POST, 'name');
    $regno = filter_input(INPUT_POST, 'Register_Number');
    $year = filter_input(INPUT_POST, 'year');
    $sec = filter_input(INPUT_POST, 'sec');
    $subject = filter_input(INPUT_POST, 'subject');
    $mail = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    $dbhost = "localhost";
    $dbname = "root";
    $dbcode = "";
    $dbtab = "srm";

    $conn = new mysqli($dbhost, $dbname, $dbcode, $dbtab);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO student VALUES('$name','$regno','$year','$sec','$subject','$mail','$password')";

    if($conn->query($sql)){
        require_once("Student-log.html");
    }
    else {
        echo "Error: ".$sql."<br>".$conn->error;
        sleep(10);
        require_once("Student-reg.html");
    }

    $conn->close();

?>