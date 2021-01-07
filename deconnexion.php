<?php
session_start();
session_unset($_SESSION["ID"]);
session_destroy();
header('location: connexion.php');
