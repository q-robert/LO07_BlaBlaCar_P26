
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
        <h1>Création d'un nouveau trajet</h1>
    </p>
    <form method="post" action="../../app/router/router1.php?action=conducteurAjouterTrajetAction">
        <div class="form-group">
            <?php
            echo("<label class='fw-bold'>Ville de départ : </label>");
            echo("<select class='form-select' name='ville_depart' style='width:300px;'>");
            foreach ($villes as $ville) {
                echo("<option value='" . $ville->getId() . "'>".$ville->getNom()."</option>");
            }
            echo("</select>");
            echo("</p>");
            echo("<label class='fw-bold'>Ville d'arrivee : </label>");
            echo("<select class='form-select' name='ville_arrivee' style='width:300px;'>");
            foreach ($villes as $ville) {
                echo("<option value='" . $ville->getId() . "'>".$ville->getNom()."</option>");
            }
            echo("</select>");
            echo("</p>");
            echo("<label class='fw-bold'>Sélection d'un véhicule : </label>");
            echo("<select class='form-select' name='vehicule_id' style='width:300px;'>");
            foreach ($vehicules as $vehicule) {
                echo("<option value='" . $vehicule['id'] . "'>".$vehicule['marque']." ".$vehicule['modele']." (".$vehicule['immatriculation'].")</option>");
            }
            echo("</select>");
            ?>
            </p>
            <label class='w-25' for="id">prix : </label>
            <input type="number" step='any' min='0' name='prix' required>          
            </p>  
            <label class='fw-bold'>Date du trajet : </label>
            <input type="date" step='any' name='date_depart' required> 
            </p>
            <label class='fw-bold'>Heure du trajet : </label>
            <input type="time" step='any' name='heure_depart' required> 
            </p>

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



