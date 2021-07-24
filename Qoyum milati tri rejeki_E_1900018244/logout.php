<?php

require_once "dbconfig.php";

$user->logout();

header('location: login.php');
