<?php
/* Controls the session if the account is correct */
session_start();

if(!isset($_SESSION['trueuser'])) {
    header("Location: index.php");
}
$usernow = $_SESSION['trueuser'];
/* Log out, kill the session and send user back to index */
if(isset($_REQUEST['log-out'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
/* Hide errors */
error_reporting(E_ERROR | E_PARSE);
/* include class files */
spl_autoload_register(function ($class){include 'classes/' . $class . '.class.php';});

$booking = new Booking;

$from = '';
$to = '';
$date = '';
$time = '';

/* Set the date for limitations later  */
$mindate = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Färdtjänst - Sundsvall & Timrå</title>

    <!--- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <!--- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<header>
    <div class="container">
        <div class="head">
            <div class="hiddennumber"><p>Vill du ha information om färdtjänst eller boka resa via telefon? Ring 060-19 14 14</p></div>
            <h1>Färdtjänst Sundsvall Timrå</h1>
            <ul>
                <li class="other"><form><input type="submit" name="log-out" class="btn" value="Logga ut" /></form></li>
                <li><a href="portal.php">Boka färdtjänst</a></li>
                <li><a href="info2.php">Priser och information</a></li>
            </ul>
        </div><!--- End of .head -->
    </div> <!--- End of first container -->
</header>
    <div class="container">
        <div class="row">
                    <div class="col-1">
                        <div class="empty">
                        <div class="annat">


                        <?php 
/* check all fields in the booking system */
if(isset($_REQUEST["bookbtn"])) {
    if(strlen($_REQUEST["from"])>0 && strlen($_REQUEST["to"])>0 && strlen($_REQUEST["date"])>0 && strlen($_REQUEST["time"])>0){ /* if something has been entered into the from / to fields */

        $rullstol = 'Nej';
        $medresenar = 'Nej';
        $ledsaga = 'Nej';
        $hjalp = 'Nej';
        if(strlen($_REQUEST["rullstol"])!=0) {
            $rullstol = 'Ja';
        }
        if(strlen($_REQUEST["ledsaga"])!=0) {
            $ledsaga = 'Ja';
        }
        if(strlen($_REQUEST["medresenar"])!=0) {
            $medresenar = 'Ja';
        }
        if(strlen($_REQUEST["hjalp"])!=0) {
            $hjalp = 'Ja';
        }

        $from = $_REQUEST["from"];
        $to = $_REQUEST["to"];
        $date = $_REQUEST["date"];
        $time = $_REQUEST["time"];

        /* Return */
        if(strlen($_REQUEST["returnfrom"])>0 && strlen($_REQUEST["returnto"])>0 && strlen($_REQUEST["returndate"])>0 && strlen($_REQUEST["returntime"])>0) {

        $rtrullstol = 'Nej';
        $rtmedresenar = 'Nej';
        $rtledsaga = 'Nej';
        $rthjalp = 'Nej';
        if(strlen($_REQUEST["returnrullstol"])!=0) {
            $rtrullstol = 'Ja';
        }
        
        if(strlen($_REQUEST["returnledsaga"])!=0) {
            $rtledsaga = 'Ja';
        }

        if(strlen($_REQUEST["returnmedresenar"])!=0) {
            $rtmedresenar = 'Ja';
        }

        if(strlen($_REQUEST["returnhjalp"])!=0) {
            $rthjalp = 'Ja';
        }
        $rtfrom = $_REQUEST["returnfrom"];
        $rtto = $_REQUEST["returnto"];
        $rtdate = $_REQUEST["returndate"];
        $rttime = $_REQUEST["returntime"];
        }

    } else {
        header("Location: portal.php");
        echo "<div class=\"error1\"><p>Du har missat att fylla i något av fälten</p></div>";
    }
    unset($_REQUEST["bookbtn"]);
    exit();
}
?></div>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="current standard">
                            <br><br>
                            <h1>Boka resa</h1>
                            <br>
                            <br>
                            <form method="post" action="order.php">
                                <input type="text" name="from" class="travelform leftinput" id="from" placeholder="Från" required />

                                <input type="text" name="to" class="travelform rightinput" id="to" placeholder="Till" required />
                                <br>
                                <br>
                                <label>Datum
                                    <br>
                                <input type="date" name="date" min="<?php echo date('Y-m-d'); ?>" class="datetime" required />
                                </label>
                                <br><br>
                                <label>Tid
                                    <br>
                                <input id="datetime" type="time" name="time" class="datetime" required />
                                </label>
                                <br><br>
                                <input type="checkbox" name="rullstol" class="check" />
                                <label>Rullstol / Rullator</label>
                                
                                <br><br>
                                <input type="checkbox" name="medresenar" class="check" />
                                <label>Medresenär</label>
                                
                                <br><br>
                                <input type="checkbox" name="ledsaga" class="check" />
                                <label>Ledsaga</label>
                                
                                <br><br>
                                <input type="checkbox" name="hjalp" class="check" />
                                <label>Hjälp till och från dörren / Bärhjälp till dörren ( 40 kr ) </label>
                                
                                <br><br><br>

                                
                                <input id="toggle-menu" type="checkbox" />
                                <label for="toggle-menu" class="menu-on"><div id="showmore"><h1>Returresa</h1><p><img src="images/rightarrow.png" alt="visa mer om returresa"></p></div></label>
                                <div class="returntrip">
                                <br>
                                <p>Du riskerar en längre väntetid om du inte bokar returresan direkt. Vill du inte boka returresan nu så lämnar du fälten tomma.</p>
                                <br>
                                <input type="text" name="returnfrom" class="travelform leftinput" id="returnfrom" placeholder="Från" />

                                <input type="text" name="returnto" class="travelform rightinput" id="returnto" placeholder="Till" />
                                <br>
                                <br>
                                <label>Datum
                                    <br>
                                <input type="date" class="datetime" min="<?php echo date('Y-m-d'); ?>" name="returndate" />
                                </label>
                                <br><br>
                                <label>Tid
                                    <br>
                                <input id="datetime" type="time" class="datetime" name="returntime" />
                                </label>
                                <br><br>

                                <input type="checkbox" name="returnrullstol" class="check" />
                                <label>Rullstol / Rullator</label>
                                
                                <br><br>
                                <input type="checkbox" name="returnmedresenar" class="check" />
                                <label>Medresenär</label>
                                
                                <br><br>
                                <input type="checkbox" name="returnledsaga" class="check" />
                                <label>Ledsaga</label>
                                
                                <br><br>
                                <input type="checkbox" name="returnhjalp" class="check" />
                                <label>Hjälp till och från dörren / Bärhjälp till dörren ( 40 kr ) </label>
                                </div> <!--- End of returntrip -->
                                <br>
                                <br>
                                <input type="submit" value="Gå vidare" name="bookbtn" class="btn" />
                                <input type="reset" value="Avbryt" class="btn" />
                                
                            </form>
                        
                        </div>
                    </div>
        </div> <!--- End of first row -->
        <div class="row">
            <div class="col-1"><div class="empty"></div></div>
            <div class="col-10">
                <div class="current standard1">
                    <h1>Historik</h1>
                </div>
            </div>
        </div>
    </div> <!--- End of second container -->
    <footer>
        <?php include 'includes/footer.php'; ?>
    </footer>

    <!--- Script for the autocomplete -->
    <script>
        function activatePlacesSearch(){
            var input1 = document.getElementById('from');
            var input2 = document.getElementById('to');
            var input3 = document.getElementById('returnfrom');
            var input4 = document.getElementById('returnto');
            var autocomplete = new google.maps.places.Autocomplete(input1);
            var autocomplete = new google.maps.places.Autocomplete(input2);
            var autocomplete = new google.maps.places.Autocomplete(input3);
            var autocomplete = new google.maps.places.Autocomplete(input4);
            
        }
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgliIFQ6HEK5QCxo6SAx_hqAzlsodOwV4&libraries=places&callback=activatePlacesSearch"></script>
</body>
</html>