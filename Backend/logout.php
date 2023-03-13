<?php
    include('./server.php');

    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    // redirect to the login page
    header('location: ../login.php');
?>