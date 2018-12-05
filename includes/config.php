<?php

spl_autoload_register(function ($class){include 'classes/' . $class . '.class.php';});


//Inställningar för databas
define("DBHOST", "bgruppen.se.mysql.service.one.com");
define("DBUSER", "bgruppen_se");
define("DBPASS", "2280804");
define("DBDATABASE", "bgruppen_se");

define("REALUSER", "bgruppen_se");
define("REALPASS", "2280804");