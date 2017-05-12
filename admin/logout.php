<?php
session_start();
header("location: login.php");

session_Destroy();                          /* after user logged out close session of username logged on..close admin panel so that it cannot be assessible again until user log in again*/

?>