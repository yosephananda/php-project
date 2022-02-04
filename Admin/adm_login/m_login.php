<?php 
    class Login
    {
        private $mysqli;

        function __construct($conn)
        {
            $this->mysqli = $conn;
        }

        public function LoginUser($username, $password)
        {
            $db = $this->mysqli->conn;
            $sql = "SELECT * FROM acc_adm Where username='$username' And password='$password'";     
            $query = $db->query($sql) or die ($db->error);      
           
            return $query;
           
        }

        public function get_sesi()
        {
            return $_SESSION['loginadmin'];
        }
    }
    

?>