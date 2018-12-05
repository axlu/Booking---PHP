<?php
$page_title = "Logga in - färdtjänst";
/*include("includes/header.php");*/
spl_autoload_register(function ($class){include 'classes/' . $class . '.class.php';});
/* This sends the username with the session, so we know who is logged in later */
?>
<?php
            session_start();

            $account = new Login();

            if(isset($_REQUEST["send"])){
                if(strlen($_REQUEST["account"])>0 && strlen($_REQUEST["password"])>0){
                    $account->checkInput($_REQUEST["account"], $_REQUEST["password"]);
                    $usr = $_REQUEST["account"];
                    $_SESSION['trueuser'] = $usr;
                } else {
                    header("Location: index.php");
                }
                unset($_REQUEST["send"]);
                exit();
            }
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
            <li><a href="index.php">Boka färdtjänst</a></li>
            <li><a href="apply.php">Ansök</a></li>
            <li><a href="info.php">Priser och information</a></li>
            </ul>
        </div><!--- End of .head -->
    </div> <!--- End of first container -->
</header>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="form standard">
                <h2>Logga in för att boka färdtjänst</h2><br><br>

                <form method="post">
                    <label>Användarnamn</label>
                    <input type="text" name="account" class="account" /><br><br>
                    <label>Lösenord</label>
                    <input type="password" name="password" class="account" /><br>
                    <input type="submit" name="send" value="Logga in" class="button" />
                </form>
                <div class="error"><p></p></div>
                </div>
            </div>
            <div class="col-6">
                <div class="sendtoinfo standard">
                    <h2>Har du inget konto?</h2>
                    <p>
                        Läs om hur du ansöker om färdtjänst under "Ansök" i huvudmenyn.
                        Där hittar du ansökningsblanketten och kontaktuppgifter.
                    </p>
                </div>
            </div>
        </div>
    </div> <!--- End of second container -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="empty"></div>
            </div>
        </div>
    </div><!--- end of last container -->
    <footer>
        <?php include 'includes/footer.php'; ?>
    </footer>
</body>
</html>