
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
                    <!--<th scope = "col">id</th>-->
                    <th scope = "col">marque</th>
                    <th scope = "col">modele</th>
                    <th scope = "col">annee</th>
                    <th scope = "col">immatriculation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des villes est dans une variable $results             
                foreach ($results as $vehicule) {
                    printf("<tr>"
                            //. "<td>%d</td>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "<td>%d</td>"
                            . "<td>%s</td>"
                            . "</tr>",
                /*$vehicule['id'],*/$vehicule['marque'], $vehicule['modele'], $vehicule['annee'], $vehicule['immatriculation']);
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewAllVille -->


