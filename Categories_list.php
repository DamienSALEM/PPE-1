<div style="text-align: left">
    <table style="border: 1px solid black">
        <tr style="border: 1px solid black">
            <td style="border: 1px solid black">Catégories:</td>
        </tr>
        <?php
        $sql = "SELECT Cat_Name FROM Category";
        $result = mysqli_query($connexion, $sql);
        for ($i = 0; $i < 4; $i++) {
            $array = mysqli_fetch_array($result);
            printf("<tr style='border: 1px solid black'><td  style='border: 1px solid black'><a href='sell_%s.php'>%s</a></td></tr>", $array[0], $array[0]);
        }
        ?>
    </table>
</div>