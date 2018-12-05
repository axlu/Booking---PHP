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
            <div class="col-3"></div>
            <div class="col-6">
                <div class="standard1 prices">
                    <h2>Kostnader</h2>
                    <br><br>
                    <h2>Du som har färdtjänst</h2>
                    <p>Reskostnaden för dig som har färdtjänsttillstånd med vanlig bil är motsvarande 1 ½ bussbiljett. Du som har tillstånd för specialfordon betalar motsvarande 1 bussbiljett. Medresenären betalar samma kostnad som dig som har färdtjänst.</p>
                    <br>
                    <h2>Ledsagare</h2>
                    <p>Om du inte klarar resan i bilen på egen hand på grund av din funktionsnedsättning kan du <a href="https://sundsvall.se/wp-content/uploads/2016/09/Ans%C3%B6kan-om-ledsagare-under-f%C3%A4rdtj%C3%A4nstresan.pdf" target="_blank" class="linkline">ansöka om att ta med en ledsagare under färdtjänstresan utan kostnad.</a></p>
                    <br>
                    <h2>Medresenär</h2>
                    <p>Alla som är beviljade färdtjänst har rätt att ta med en medresenär. Medresenären betalar samma kostnad som dig som har färdtjänst.</p>
                </div>
            </div>
        </div> <!--- End of row -->
        <div class="row">
            <div class="col-3"><div class="empty"></div></div>
            <div class="col-6">
                <div class="standard1 prices">
                    <h2>Tider</h2>
                    <br><br>
                    <p>
                    Den som är beviljad färdtjänst kan resa under de tider som busstrafiken är tillgänglig.
                    <br><br>
                    Måndag – torsdag klockan 05.00 – 23.15<br>
                    Fredag – lördag klockan 05.00 – 03.15<br>
                    Söndag och helgdag klockan 06.00 – 23.15<br>
                    Nyårsafton och midsommarafton klockan 06.00 – 03.15<br>
                    Julafton klockan 06.00 – 23.15 (undantag)<br>
                    <br><br>
                    Resor utanför ovanstående tider kan bokas mot taxiavgift. Med reservation för vissa ändringar.
                    </p>
                </div>
            </div>
        </div> <!--- End of row -->
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="standard1 prices">
                    <h2>Att tänka på när du bokar</h2>
                    <br><br>
                    <p>
                    boka resan senast 1 timme före avresa. För färdtjänstresor som börjar och slutar utanför tätorten, och resor med specialfordon, måste du senast beställa minst 2 timmar före avresa.
                    <br><br>
                    beställ returresan på en gång, om det går.
                    </p>
                </div>
            </div>
        </div> <!--- End of row -->
   </div> <!--- End of second container -->
   <footer>
        <?php include 'includes/footer.php'; ?>
    </footer>
</body>
</html>