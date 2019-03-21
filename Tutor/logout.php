<?php
    unset($_SESSION['var']);
    unset($_SESSION['var1']);
    session_unset(); 
    session_destroy(); 
    exit; 
?>