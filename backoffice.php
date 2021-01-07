<?php
require_once "connexion_base.php";

if ($_SESSION["admin"] == 1) {

    $sql2 = "SELECT Prod_Name, Cat_Name, Description, Price, waiting.ID, Sold_By, Category FROM waiting INNER JOIN category ON waiting.Category = category.ID";
    $result2 = mysqli_query($connexion, $sql2);
    $prodname;
    $cat;
    $desc;
    $price;
    $soldby;
    $ID;
    if (isset($_POST["validation"])) {

        $sql = "INSERT INTO products VALUES (null, '" . $prodname . "', '" . $cat . "', '" . $desc . "', '" . $price . "', '" . $soldby . "')";
        $result = mysqli_query($connexion, $sql);
        $sql3 = "DELETE FROM waiting WHERE ID=$ID";
        $result3 = mysqli_query($connexion, $sql3);
        if (($result == TRUE) && ($result3 == TRUE)) {
            $msg = "<div style='color:green'>Item successfully added!</div>";
        } else {
            $msg = "<div style='color:red'>A problem as occured</div>";
        }
    }
    if (isset($_POST["delete"])) {

        $sql3 = "DELETE FROM waiting WHERE ID=$ID";
        $result3 = mysqli_query($connexion, $sql3);
        if (($result3 == TRUE)) {
            $msg = "<div style='color:green'>Item successfully deleted!</div>";
        } else {
            $msg = "<div style='color:red'>A problem as occured</div>";
        }
    }
} else {
    header("user.php");
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
    <h1 style="text-align: center">Listes des instruments en attente de validation:</h1>
    <div class="row">
        <div class="col-2">
            <?php
            require_once "Categories_list.php"
            ?>
        </div>
        <section class="col-10">
            <div>
                <table style="text-align: center">
                    <tr>
                        <td>Produit</td>
                        <td>Catégorie</td>
                        <td>Description</td>
                        <td>Prix</td>
                        <td>Vendu par</td>
                    </tr>
                    <?php
                    for ($i = 0; $i < $nb; $i++) {
                        $array2 = mysqli_fetch_array($result2);
                        printf("<tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td> <form method='POST' action='achat.php'>
                <input type='hidden' name='ID' value=%s>
                <button type='submit'>achat</button>
                </form> </td>
                </tr>", $array2[0], $array2[1], $array2[2], $array2[3]);
                    }
                    ?>
                </table>
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