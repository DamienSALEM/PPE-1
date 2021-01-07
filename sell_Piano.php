<?php
require_once "connexion_base.php"
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1, 
    shrink-to-fit=no">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/test.css">
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
    ?>
    <br>
    <h1 style="text-align: center">Ici on vend les Pianos!</h1>
    <div class="row">
        <div class="col-2">
            <?php
            require_once "Categories_list.php"
            ?>
        </div>

        <section class="col-10">
            <table>
                <tr>
                    <td>Produit</td>
                    <td>Description</td>
                    <td>Prix</td>
                </tr>
                <?php
                $sql2 = "SELECT Prod_Name, Description, Price, ID FROM products where Category=1";
                $result2 = mysqli_query($connexion, $sql2);
                $nb = mysqli_num_rows($result2);
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
    <br>
    <footer>
        <?php
        require_once "footer.php"
        ?>
    </footer>

</body>

</html>