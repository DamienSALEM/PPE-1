<?php
session_start();
$connexion = mysqli_connect("localhost:3306", "root", "", "PPE1");

if (mysqli_connect_errno()) {
    printf("Echec de la connexion: %s\n", mysqli_connect_error());
    exit();
}
