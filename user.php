<?php
require_once "connexion_base.php";
if (isset($_SESSION["ID"]) == FALSE) {
    header('location: connexion.php');
}
$ID = $_SESSION["ID"];
$sql = "SELECT Password from users WHERE ID=$ID";
$result = mysqli_query($connexion, $sql);
$pass = mysqli_fetch_array($result);
if (isset($_POST["new_Password"]) && isset($_POST["Password"])) {
    if ($_POST["Password"] == $pass["Password"]) {
        $modif = $_POST["new_Password"];
        $sql = "UPDATE users SET Password='" . $modif . "' WHERE ID=$ID";
        $result = mysqli_query($connexion, $sql);
        if ($result == TRUE) {
            $msg = "<div style='color:green'>Password updated!</div>";
        } else {
            $msg = "<div style='color:red'>A problem as occured</div>";
        }
    } else {
        $msg = "<div style='color:red' >Enter the right password</div>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1, 
    shrink-to-fit=no">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script>
        src = "js/jquery-prod.js"
    </script>
    <script>
        src = "js/bootstrap.min.js"
    </script>
    <script>
        src = "js/bootstrap.bundle.min.js"
    </script>

    <title>La théorie des cordes</title>


</head>

<body class="container">

    <?php
    require_once "header.php"
    ?><br>

    <div class="row">
        <div class="col-2">
            <?php
            require_once "Categories_list.php"
            ?>
        </div>
        <section class="col-10">

            <div style="border-style:solid; border-width:5px;border-color:black;padding:20px">
                <div>Votre Profil:</div>
                <table style="border-style:solid; border-width:1px;border-color:black;padding:5px">

                    <?php
                    $sql2 = "SELECT Name, LastName, Email, Password FROM users WHERE ID=$ID";
                    $result2 = mysqli_query($connexion, $sql2);
                    $nb = mysqli_num_rows($result2);
                    for ($i = 0; $i < $nb; $i++) {
                        $array2 = mysqli_fetch_array($result2);
                        printf('<tr >
                    <td style="border-style:solid; border-width:1px;border-color:black;padding:2px">Your Name:</td><td style="border-style:solid; border-width:1px;border-color:black;padding:2px">%s</td></tr>
                    <tr><td style="border-style:solid; border-width:1px;border-color:black;padding:2px">Your LastName:</td><td style="border-style:solid; border-width:1px;border-color:black;padding:2px">%s</td></tr>
                    <tr><td style="border-style:solid; border-width:1px;border-color:black;padding:2px">Your Email:</td><td style="border-style:solid; border-width:1px;border-color:black;padding:2px">%s</td></tr>
                </tr>', $array2[0], $array2[1], $array2[2]);
                    }
                    ?>
                </table>
                <br>
                <form action="" method="POST" style="border-style:solid; border-width:1px;border-color:black;padding:2px">
                    <div style="border-style:solid; border-width:1px;border-color:black;padding:2px">To change your password:</div>

                    <div style="border-style:solid; border-width:1px;border-color:black;padding:2px">
                        <label>
                            Enter your password:
                        </label>
                        <input size=60 type="password" name="Password" placeholder="Password" id="Password" required>
                    </div>
                    <div style="border-style:solid; border-width:1px;border-color:black;padding:2px">
                        <label>Enter you new password:</label>
                        <input size=60 type="password" name="new_Password" placeholder="New Password" id="new_Password" required>
                    </div>

                    <button type="submit">Change</button>
                </form>
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
            </div>
        </section>


    </div>
    <br>
    <footer>
        <?php
        require_once "footer.php"
        ?>
    </footer>

</body>

</html>