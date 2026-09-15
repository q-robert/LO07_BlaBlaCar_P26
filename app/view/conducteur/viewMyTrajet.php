
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
        <h1>Tableau de tous mes trajets</h1>

        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">ville_depart</th>
                    <th scope = "col">ville_arrivee</th>
                    <th scope = "col">date_depart</th>
                    <th scope = "col">heure_depart</th>
                    <th scope = "col">statut</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des villes est dans une variable $results             
                foreach ($results as $trajet) {
                    printf("<tr>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "</tr>",
                $trajet['ville_depart'],$trajet['ville_arrivee'], $trajet['date_depart'], $trajet['heure_depart'], $trajet['statut']);
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewAllVille -->


