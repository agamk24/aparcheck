<?php
session_start();

session_destroy();
header("Location:https://aparcheck.000webhostapp.com/login.php");
// header("Location:http://localhost/aparcheck/login.php");