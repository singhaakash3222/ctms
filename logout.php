<?php
include('include/database.php');
include('session.php');

session_start();
session_destroy();

header('location:index.php');

?>