<?php 
    class AdminBlog{
        public function __construct()
        {
            #database host, database user, database pass, database name
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = "";
            $dbname = 'blogproject';

            $this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
            
            if(!$this->conn){
                die("Database Connection Error!!");
            }
        }
    }

?>