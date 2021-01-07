<header>
    <a href='index.php'>
        <h1 style='text-align: center'>Bienvenue dans La théorie des cordes!</h1>
    </a>
    <br>
    <nav style="color:white">
        <div class="row">
            <div class="col-2" style="padding-left: 35px;padding-bottom : 5px">
                <?php
                if (isset($_SESSION["ID"])) {
                    echo ('<a href="user.php">user page</a>');
                    echo ('<br><a href="deconnexion.php">deconnexion</a>');
                    echo ('<br><a href="vente.php">vente</a>');
                } else {
                    echo ('<a href="connexion.php">connexion</a>');
                }
                ?>
            </div>

            <div class=" col-10" style="padding: 5px">
                <form action="search.php" method="POST">
                    <input size="60" type="text" placeholder="search" name="search">
                    <button type="submit">search</button>
                </form>
            </div>
        </div>

    </nav>
</header>