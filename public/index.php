<?php
session_start();
$_SESSION['status'] = "";
date_default_timezone_set("Asia/Makassar");
require_once("../app/init.php");

$App = new App();