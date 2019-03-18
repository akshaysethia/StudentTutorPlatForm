<?php
    $name = filter_input(INPUT_POST, 'name');
    $regno = filter_input(INPUT_POST, 'Register_Number');
    $subject = filter_input(INPUT_POST, 'sub');
    $mail = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    $dbhost = "localhost";
    $dbname = "root";
    $dbcode = "";
    $dbtab = "SRM";

    $conn = new mysqli($dbhost, $dbname, $dbcode, $dbtab);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tutor VALUES('$name','$regno','$subject','$mail','$password')";

    if($conn->query($sql)){
         require_once("Tutor-log.html");
    }
    else {
        echo "Error: ".$sql."<br>".$conn->error;
    }

    $conn->close();

?>