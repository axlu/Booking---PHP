<?php

include("includes/config.php");

class Booking {

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

    
    /* Add order to database */
    public function newOrder($usernow, $from, $to, $date, $time, $rullstol, $medresenar, $ledsaga, $hjalp, $rtfrom, $rtto, $rtdate, $rttime, $rtrullstol, $rtmedresenar, $rtledsaga, $rthjalp)
    {
        
        $from = $this->db->real_escape_string($from);
        $to = $this->db->real_escape_string($to);
        $query ="INSERT INTO orders values ('$usernow','$from','$to', '$date', '$time', '$rullstol', '$medresenar', '$ledsaga', '$hjalp');";
        $querysecond ="INSERT INTO orders values ('$usernow','$rtfrom','$rtto', '$rtdate', '$rttime', '$rtrullstol', '$rtmedresenar', '$rtledsaga', '$rthjalp');";
            
        
        if(!$rtfrom) { 
            
            mysqli_query($this->db, $query);
            echo("<div class=\"congratz\"><p>Din enkelresa är nu bokad!</p></div>");
            
        } else { 
            
            $rtfrom = $this->db->real_escape_string($rtfrom);
            $rtto = $this->db->real_escape_string($to);
            
            mysqli_query($this->db, $query);
            mysqli_query($this->db, $querysecond);
            echo("<div class=\"congratz\"><p>Dina resor är nu bokade!</p></div>");
        
        }
        
        
            /* echo("<script>location.href = 'portal.php';</script>"); */
        mysqli_close($this->db);

    }
    
}