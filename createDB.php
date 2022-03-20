<?php
class CreateDb {
    public $srv_name;
    public $u_name;
    public $pwd;
    public $tbl_name;
    public $con;
    public $dbname;

    public function __construct($dbname="MyDb", $tbl_name = "productdb", $srv_name = "localhost", $u_name = "root", $pwd=""){
        $this->srv_name = $srv_name;
        $this->u_name = $u_name;
        $this->pwd = $pwd;
        $this->tbl_name = $tbl_name;
        $this->dbname = $dbname;
        $this->con = mysqli_connect($srv_name, $u_name, $pwd);

        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($srv_name, $u_name, $pwd, $dbname);

            $sql = " CREATE TABLE IF NOT EXISTS $tbl_name
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             bkName VARCHAR (25) NOT NULL,
                             bkText VARCHAR (100),
                             bkImg VARCHAR (100)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    } 

    public function getData(){
        $sql = "SELECT * FROM $this->tbl_name";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}