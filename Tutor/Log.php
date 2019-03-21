<?php
    session_start();
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

    $sql = "SELECT name,sub,password FROM tutor WHERE regno='$name'";

    $result = $conn->query($sql);
    
    if($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
            $tut = $row["name"];
            $value = $row["sub"];
            $value1 = $row["password"];
        }
    }

    if($pass == $value1) {
        $_SESSION['var'] = $tut;
        $_SESSION['var1'] = $value;
        require_once("index.html");
    }
    else {
        echo "<script type='text/javascript'>alert('$shit');</script>";
        sleep(10);
        require_once("Tutor-log.html");
    }
    $conn->close();
?>