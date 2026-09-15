<!-- ----- début viewAjouterConducteurAction -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentMenu.php';
        ?>
        <div class = "mt-4 p-5 bg-success text-white rounded">
            <h1>Voici toutes les supers globales : </h1>
            
        </div>
            <?php
            echo ("<h2>SESSION</h2>");

            echo ("<pre>");
            print_r($_SESSION);
            echo ("</pre>");

            echo ("<h2>COOKIE</h2>");

            echo ("<pre>");
            print_r($_COOKIE);
            echo ("</pre>");
            ?>
        <p/>

    </div>   


    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    <!-- ----- fin de la page viewAcceuil -->

</body>
</html>