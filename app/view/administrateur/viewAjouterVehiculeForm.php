
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
        <h1>Ajouter un Véhicule</h1>
    </p>
    <form method="post" action="../../app/router/router1.php?action=ajouterVehiculeAction">
        <div class="form-group">
            <input type="hidden" name='action'>        
            <label class='w-25' for="id">marque : </label><input type="text" name='marque' required> 
            </p>                          
            <label class='w-25' for="id">modele: </label><input type="text" name='modele' required> 
            </p> 
            <label class='w-25' for="id">annee : </label><input type="number" step='any' min='0' max='2026' name='annee' required>          
            </p>                          
            <label class='w-25' for="id">immatriculation : </label><input type="text" name='immatriculation' required> 
            </p>                          

            <label for='$label' class=' fw-bold'>Sélectionnez un propriétaire : </label>

            <?php
            echo("<select class='form-select' name='proprietaire' style='width:300px;'>");
            foreach ($results as $vehicule) {
                echo("<option value='" . $vehicule['id'] . "'>". $vehicule['nom'] . " " . $vehicule['prenom'] ."</option>");
            }
            echo("</select>");
            ?>

        </div>
        <p/>
        <br/> 
        <input type="reset"></input>
        <input type="submit"></input>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewAjouterVilleForm -->



