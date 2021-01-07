<?php
require_once "connexion_base.php";
if (isset($_SESSION["ID"]) == TRUE) {
    header('location: user.php');
}
if (isset($_POST["connexion"])) {
    $email = $_POST["Email"];
    $password = $_POST["Password"];

    $sql = "SELECT count(*) as nbuser, ID FROM users where Email = '" . $email . "' and Password = '" . $password . "'";
    $result = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_array($result);
    if ($row['nbuser'] == 0) {
        $msg = "<h1>Connexion problem, retry</h1>";
    } else {
        $_SESSION["ID"] = $row["ID"];
        header('Location: user.php');
    }
} elseif (count($_POST) > 0) {
    $name = $_POST["Name"];
    $lastname = $_POST["LastName"];
    $email = $_POST["iEmail"];
    $pswd = $_POST["iPassword"];

    $sql = "SELECT count(*) as nbuser FROM users where email = '" . $email . "'";
    $result = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_array($result);

    if ($row['nbuser'] == 0) {
        $req = "INSERT INTO users VALUES (null, '" . $name . "', '" . $lastname . "', '" . $email . "', '" . $pswd . "', 0)";
        $resultat = mysqli_query($connexion, $req);
        if ($resultat == false) {
            $msg = "<h1>sorry, a problem occured, retry</h1>";
            die();
        } else {
            $sql = "SELECT count(*) as nbuser, ID FROM users where Email = '" . $email . "' and Password = '" . $pswd . "'";
            $result = mysqli_query($connexion, $sql);
            $row = mysqli_fetch_array($result);
            if ($row['nbuser'] == 0) {
                $msg = "<h1>Connexion problem, retry</h1>";
            } else {
                $_SESSION["ID"] = $row["ID"];
                header('Location: user.php');
            }
        }
    } else {
        $msg = "<h1>This mail is already used, retry with another</h1>";
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



    <title>La théorie des cordes</title>


</head>

<body class="container">

    <?php
    require_once "header.php";
    if (isset($msg)) {
        echo $msg;
    }
    ?>
    <br>
    <div class="row">
        <div class="col-2">
            <?php
            require_once "Categories_list.php"
            ?>
        </div>
        <section class="col-10">
            <div style="border: 3px solid black; padding:5px;margin-bottom:10px">
                <form action="" method="POST" name="connexion" id="connexion">
                    <div>
                        Connection:
                        <div>Email:
                            <input type="email" name="Email" placeholder="Email" id="Email">
                        </div>
                        <div>Enter your password:
                            <input type="password" name="Password" placeholder="Password" id="Password">
                        </div>
                        <input type="hidden" name="connexion" value="1">
                        <button onclick="validconnexion()">Connexion</button>
                        <p style="color:red" id="warning"></p>
                    </div>
                </form>
            </div>
            <div style="border: 3px solid black; padding:5px">
                <form action="" method="POST" name="inscription" id="inscription">
                    Inscription:
                    <div>First Name:
                        <input type="text" name="Name" placeholder="Name" id="Name">
                    </div>
                    <div>Last Name:
                        <input type="text" name="LastName" placeholder="Last Name" id="LastName">
                    </div>
                    <div>Email:
                        <input type="email" name="iEmail" placeholder="Email" id="iEmail">
                    </div>
                    <div>Enter your password:
                        <input type="password" name="iPassword" placeholder="Password" id="iPassword">
                    </div>
                    <div>Verify your password:
                        <input type="password" name="Password_verif" placeholder="Password Verification" id="Password_verif">
                    </div>
                    <button onclick="validform()">Inscription</button>
                    <p style="color:red" id="warning"></p>
                </form>
            </div>
            <script src="js/fonctions.js">
            </script>
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