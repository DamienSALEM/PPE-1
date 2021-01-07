<?php
require_once "connexion_base.php";
if (isset($_SESSION["ID"]) == FALSE) {
    header('location: connexion.php');
}
if (count($_POST) > 0) {
    $item = $_POST["Item_Name"];
    $cat = $_POST["Category"];
    $desc = $_POST["Description"];
    $price = $_POST["Price"];
    $id = $_SESSION["ID"];
    $sql = "INSERT INTO waiting VALUES (null, '" . $item . "', '" . $cat . "', '" . $desc . "', '" . $price . "', '" . $id . "')";
    $result = mysqli_query($connexion, $sql);
    if ($result == TRUE) {
        $msg = "<div style='color:green'>Item successfully added!</div>";
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
    ?>
    <br>
    <div class="row">
        <div class="col-2">
            <?php
            require_once "Categories_list.php"
            ?>
        </div>
        <section class="col-10">
            <div>
                <form action="" method="POST">
                    To sell, fill this form:
                    <br>
                    <div>Item name:</div>
                    <input type="text" name="Item_Name" placeholder="Item Name" id="Item_Name" required>
                    <br>
                    <div>Category:</div>
                    <select name="Category" id="Category" required>

                        <?php
                        $sql2 = "SELECT ID,Cat_Name FROM category";
                        $result2 = mysqli_query($connexion, $sql2);
                        $nb = mysqli_num_rows($result2);
                        for ($i = 0; $i < $nb; $i++) {
                            $array2 = mysqli_fetch_array($result2);
                            printf("<option value=%s >%s</option>", $array2[0], $array2[1]);
                        }
                        ?>
                    </select>
                    <br>
                    <div>Description:</div>
                    <textarea style="text-align: left" rows="4" cols="50" name="Description" id="Description" required>What is this item?</textarea>
                    <br>
                    <div>Price:</div>
                    <input type="number" name="Price" placeholder="000,00" id="Price" required> euros
                    <br>
                    <button type="submit">Sell</button>
                    <p style="color:red" id="warning"></p>
                </form>
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