
<!-- ----- début viewAjouterVilleAction-->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>
        <!-- ===================================================== -->
        <h1>Cloture du trajet : </h1>
        <?php
        if ($reussi == TRUE) {
            echo("<p>Le trajet s'est bien cloturer</p>");
        }else {
            echo("<p>Erreur dans la cloture du trajet</p>");
        }
        ?>
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewAjouterVilleAction -->    


