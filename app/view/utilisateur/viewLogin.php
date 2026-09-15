<!-- ----- début viewAll -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>
        <h1>Formulaire de connexion</h1>
        <div class='mx-lg-3'> 
            <?php
            echo ("<form method='post' action='router1.php?action=loginAction'>");
            ?>
                <label for="nom"> Login</label>
                </p>
                <input type="texte" id="login" name="login" required></input>
                </p>
                <label for="mdp"> Mot De Passe</label>
                </p>
                <input type="password" id="password" name="password" required></input>
                </p>
                <input type="reset"></input>
                <input type="submit"></input>
            </form>
        </div>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewAll -->


