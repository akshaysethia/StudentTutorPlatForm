<?php
session_start();
$name = $_SESSION['var'];
$dbhost = "localhost";
$dbname = "srm";
$dbpass = "";
$dbshit = "root";

echo $name;

$conn = new mysqli($dbhost, $dbshit, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT regno FROM student WHERE name = 'name'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $value = $row["regno"];
    }
}

echo $value;

$sql = "SELECT * FROM attendance WHERE regno = '$value'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $value = $row["regno"];
        $value1 = $row["max"];
        $value2 = $row["pre"];
    }
}

$conn->close();
$_SESSION['value'] = $value;
$_SESSION['value1'] = $value1;
$_SESSION['value2'] = $value2;
require_once("attendance.html");

?>