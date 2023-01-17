<?php

session_start();
session_unset();
session_destroy();

// going back to login page
header("location:../login.php");