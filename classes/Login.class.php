<?php

    include("includes/config.php");

class Login {

    private $db;
    private $us;
    private $pw;

    /* connect to database */
    function __construct() {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if($this->db->connect_errno > 0)
        {
            die("Fel vid anslutning: " . $this->db->connect_error);
        }
    }

    
    /* Login */
    public function checkInput($username, $password)
    {
        $username = $this->db->real_escape_string($username);
        $password = $this->db->real_escape_string($password);
        
        $query ="SELECT * FROM users WHERE account = '$username' and password = '$password'";
        
        $result = $this->db->query($query);

        mysqli_query($this->db, $query);

        if(mysqli_num_rows($result) > 0){
            header("Location: portal.php");
        }
        else {
            header("Location: index.php");
        }
        mysqli_close($db);
        
    }
}