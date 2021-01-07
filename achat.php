<?php
require_once "connexion_base.php";
if (isset($_SESSION["ID"]) == FALSE) {
    header('location: connexion.php');
}
$IDbuy = $_SESSION["ID"];
$ID = $_POST["ID"];
$sql2 = "SELECT Prod_Name, Cat_Name, Description, Price, products.ID, Sold_By, Category FROM products INNER JOIN category ON products.Category = category.ID WHERE products.ID=$ID";
$result2 = mysqli_query($connexion, $sql2);
$array2 = mysqli_fetch_array($result2);
$prodname = $array2[0];
$cat = $array2[6];
$desc = $array2[2];
$price = $array2[3];
$soldby = $array2[5];
if (isset($_POST["valid"])) {

    $sql = "INSERT INTO commandes VALUES (null, '" . $prodname . "', '" . $cat . "', '" . $desc . "', '" . $price . "', '" . $soldby . "', '" . $IDbuy . "')";
    $result = mysqli_query($connexion, $sql);
    $sql3 = "DELETE FROM products WHERE ID=$ID";
    $result3 = mysqli_query($connexion, $sql3);
    if (($result == TRUE) && ($result3 == TRUE)) {
        $msg = "<div style='color:green'>Item successfully purchased!</div>";
    } else {
        $msg = "<div style='color:red'>A problem as occured</div>";
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
    require_once "header.php";
    if (isset($msg)) {
        echo $msg;
    }
    ?><br>
    <?php
    printf('<h1 style="text-align: center">Achat: %s</h1>', $array2[0])
    ?>
    <div class="row">
        <div class="col-2">
            <?php
            require_once "Categories_list.php"
            ?>
        </div>
        <section class="col-10">
            <div>
                <?php
                printf('
                <div>
                    Produit: %s
                </div>
                <div>
                    Catégorie: %s
                </div>
                <div>
                    Description: %s
                </div>
                <div>
                    Prix: %s euros
                </div>
                <form method="POST" action="">
                    <input type="hidden" name="valid" value="TRUE">
                    <input type="hidden" name="ID" value=%s>
                    <button type="submit">Valider l\'achat</button>
                </form>
                ', $array2[0], $array2[1], $array2[2], $array2[3], $array2[4])
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