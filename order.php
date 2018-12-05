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
/*error_reporting(E_ERROR | E_PARSE);*/
/* include class files */
spl_autoload_register(function ($class){include 'classes/' . $class . '.class.php';});

$booking = new Booking;
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

                        </div>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="current standard">
                            <br><br>
                            <h1>Kontrollera resa</h1>
                            <br>
                            <br>
                            <div class="newformlarge">
                          <div class="newform">
                              <?php
                              if(isset($_POST['from'])) {
                                $from = $_POST['from'];
                                $to = $_POST['to'];
                                $date = $_POST['date'];
                                $time = $_POST['time'];
                                
                                $rullstol = 'Nej';
                                $medresenar = 'Nej';
                                $ledsaga = 'Nej';
                                $hjalp = 'Nej';
                                if(strlen($_POST["rullstol"])!=0) {
                                    $rullstol = 'Ja';
                                }
                                if(strlen($_POST["ledsaga"])!=0) {
                                    $ledsaga = 'Ja';
                                }
                                if(strlen($_POST["medresenar"])!=0) {
                                    $medresenar = 'Ja';
                                }
                                if(strlen($_POST["hjalp"])!=0) {
                                    $hjalp = 'Ja';
                                }
                                

                                /* RETURN */
                                if(strlen($_POST["returnfrom"])>0 && strlen($_POST["returnto"])>0 && strlen($_POST["returndate"])>0 && strlen($_POST["returntime"])>0) {
                                $rtfrom = $_POST['returnfrom'];
                                $rtto = $_POST['returnto'];
                                $rtdate = $_POST['returndate'];
                                $rttime = $_POST['returntime'];

                                
                                if(strlen($_POST["returnrullstol"])!=0) {
                                    $rtrullstol = 'Ja';
                                } else {
                                    $rtrullstol = 'Nej';
                                }
                                if(strlen($_POST["returnledsaga"])!=0) {
                                    $rtledsaga = 'Ja';
                                } else {
                                    $rtledsaga = 'Nej';
                                }
                                if(strlen($_POST["returnmedresenar"])!=0) {
                                    $rtmedresenar = 'Ja';
                                } else {
                                    $rtmedresenar = 'Nej';
                                }
                                if(strlen($_POST["returnhjalp"])!=0) {
                                    $rthjalp = 'Ja';
                                } else {
                                    $rthjalp = 'Nej';
                                }
                            } else {

                                $rtfrom = NULL;
                                $rtto = NULL;
                                $rtdate = NULL;
                                $rttime = NULL;
                            }
                        }
                             ?>
                            <form method="post" action="order.php">
                                <h2>Kontrollera bokningen</h2><br><br>
                                <label>Från:</label><input type="text" name="from" readonly="readonly" class="checkorder" value="<?= $from; ?>"><hr><br>
                                <label>Till:</label> <input type="text" name="to" readonly="readonly" class="checkorder" value="<?= $to; ?>"><hr><br>
                                <label>Datum:</label> <input type="text" name="date" readonly="readonly" class="checkorder" value="<?= $date; ?>"><hr><br>
                                <label>Tid:</label> <input type="text" name="time" readonly="readonly" class="checkorder" value="<?= $time; ?>"><hr><br>
                                <label>Rullstol/Rullator:</label><input type="text" name="rullstol" readonly="readonly" class="checkorder" value="<?= $rullstol; ?>"><hr><br>
                                <label>Medresenär:</label> <input type="text" name="medresenar" readonly="readonly" class="checkorder" value="<?= $medresenar; ?>"><hr><br>
                                <label>Ledsagare:</label> <input type="text" name="ledsaga" readonly="readonly" class="checkorder" value="<?= $ledsaga; ?>"><hr><br>
                                <label>Bärhjälp:</label> <input type="text" name="hjalp" readonly="readonly" class="checkorder" value="<?= $hjalp; ?>"><hr><br>
                                <br><br><br><h2>Retur</h2><br>
                                <label>Från:</label><input type="text" name="returnfrom" readonly="readonly" class="checkorder" value="<?= $rtfrom; ?>"><hr><br>
                                <label>Till:</label> <input type="text" name="returnto" readonly="readonly" class="checkorder" value="<?= $rtto; ?>"><hr><br>
                                <label>Datum:</label> <input type="text" name="returndate" readonly="readonly" class="checkorder" value="<?= $rtdate; ?>"><hr><br>
                                <label>Tid:</label> <input type="text" name="returntime" readonly="readonly" class="checkorder" value="<?= $rttime; ?>"><hr><br>
                                <label>Rullstol/Rullator:</label><input type="text" name="returnrullstol" readonly="readonly" class="checkorder" value="<?= $rtrullstol; ?>"><hr><br>
                                <label>Medresenär:</label> <input type="text" name="returnmedresenar" readonly="readonly" class="checkorder" value="<?= $rtmedresenar; ?>"><hr><br>
                                <label>Ledsagare:</label> <input type="text" name="returnledsaga" readonly="readonly" class="checkorder" value="<?= $rtledsaga; ?>"><hr><br>
                                <label>Bärhjälp:</label> <input type="text" name="returnhjalp" readonly="readonly" class="checkorder" value="<?= $rthjalp; ?>"><hr><br>
                                <br><br><br>
                                <input type="submit" name="book" value="Boka" class="btn marginbtn">
                                <input type="submit" name="avbryt" value="Tillbaka" class="btn">
                            </form>
                          </div>
                        </div> <!--- end of newformlarge -->
                        <?php
                            if(isset($_REQUEST["book"])) {
                                $from = $_REQUEST["from"];
                                $to = $_REQUEST["to"];
                                $date = $_REQUEST["date"];
                                $time = $_REQUEST["time"];
                                $rullstol = $_REQUEST["rullstol"];
                                $medresenar = $_REQUEST["medresenar"];
                                $ledsaga = $_REQUEST["ledsaga"];
                                $hjalp = $_REQUEST["hjalp"];
                                $rtfrom = $_REQUEST["returnfrom"];
                                $rtto = $_REQUEST["returnto"];
                                $rtdate = $_REQUEST["returndate"];
                                $rttime = $_REQUEST["returntime"];
                                $rtrullstol = $_REQUEST["returnrullstol"];
                                $rtmedresenar = $_REQUEST["returnmedresenar"];
                                $rtledsaga = $_REQUEST["returnledsaga"];
                                $rthjalp = $_REQUEST["returnhjalp"];


                                $booking->newOrder($usernow, $from, $to, $date, $time, $rullstol, $medresenar, $ledsaga, $hjalp, $rtfrom, $rtto, $rtdate, $rttime, $rtrullstol, $rtmedresenar, $rtledsaga, $rthjalp);
                                
                            }
                            if(isset($_REQUEST["avbryt"])) {
                                echo("<script>location.href = 'portal.php';</script>");
                            }
                        ?>
                        
                        </div>
                    </div>
        </div> <!--- End of first row -->
        
    </div> <!--- End of second container -->
    <footer>
        <?php include 'includes/footer.php'; ?>
    </footer>

 
</body>
</html>