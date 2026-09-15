
<!-- ----- début viewAjouterVilleForm -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?> 
        <h1>Sélectionnez l'un de vos trajets actifs</h1>
    </p>
    <form method="post" action="../../app/router/router1.php?action=conducteurListePassagerTrajetAction">
        <div class="form-group">
            <?php
            echo("<select class='form-select' name='trajet_id' style='width:300px;'>");
            foreach ($trajets as $trajet) {
                echo("<option value='" . $trajet['id'] . "'>" . $trajet['ville_depart'] . " vers " . $trajet['ville_arrivee'] . " le " . $trajet['date_depart'] . " à " . $trajet['heure_depart'] . "</option>");
            }
            echo("</select>");
            echo("</p>");
            ?>
        </div>
        <br/> 
        <input type="reset"></input>
        <input type="submit"></input>
    </form>
</p>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewAjouterVilleForm -->



