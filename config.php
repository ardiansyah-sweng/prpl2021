<?php

class DbConnect {

    public $conn;

    function __construct() {
        $sname = "localhost";
        $uname = "root";
        $password = "";
        $db_name = "prpl_db";

        $this->conn = new mysqli($sname, $uname, $password, $db_name);
        if(mysqli_connect_errno()) {
            echo "Connection Failed";
        }

    }

    public function close() {
        mysqli_close();
    }

}

?>