<?php
    $name = filter_input(INPUT_POST, 'name');
    $regno = filter_input(INPUT_POST, 'Register_Number');
    $year = filter_input(INPUT_POST, 'Year');
    $sec = filter_input(INPUT_POST, 'Sec');
    $subject = filter_input(INPUT_POST, 'Sub');
    $mail = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $null = 0;

    $dbhost = "localhost";
    $dbname = "root";
    $dbcode = "";
    $dbtab = "srm";

    $conn = new mysqli($dbhost, $dbname, $dbcode, $dbtab);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO student VALUES('$name','$regno','$year','$sec','$subject','$mail','$password')";
    $ssql = "INSERT INTO attendance VALUES('$regno', '$null', '$null')";

    if($conn->query($sql) & $conn->query($ssql)){
        require_once("Student-log.html");
    }
    else {
        echo "Error: ".$sql."<br>".$conn->error;
        echo "Error: ".$ssql."<br>".$conn->error;
        sleep(10);
    }

    $conn->close();

?>