
<!-- ----- début viewAllVille -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?>
        <h1>Tableau de toutes les véhicules</h1>

        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">date_depart</th>
                    <th scope = "col">heure_depart</th>
                    <th scope = "col">ville de depart</th>
                    <th scope = "col">destination</th>
                    <th scope = "col">conducteur</th>
                    <th scope = "col">vehicule</th>
                    <th scope = "col">immatriculation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des villes est dans une variable $results             
                foreach ($results as $reservation) {
                    $nom =  $reservation['conducteur_nom'] ." ". $reservation['conducteur_prenom'];
                    $vehicule =  $reservation['marque'] ." ". $reservation['modele'];
                    printf("<tr>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "</tr>",
                $reservation['date_depart'],$reservation['heure_depart'], $reservation['ville_depart'], $reservation['ville_arrivee'], $nom,$vehicule,$reservation['immatriculation']);
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewAllVille -->


