<?php
    session_name('Chutiya');
    session_start();
    session_save_path();
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

    $sql = "SELECT name,password FROM student WHERE regno='$name'";
    $result = $conn->query($sql);
    if($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
            $stud = $row["name"];
            $value = $row["password"];
        }
    }

    if($pass == $value) {
        $_SESSION["studname"] = $stud;
        require_once("index.html");
    }
    else {
        echo "<script type='text/javascript'>alert('$shit');</script>";
        sleep(10);
        require_once("Student-log.html");
    }
    $conn->close();
?>