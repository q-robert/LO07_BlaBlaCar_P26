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
            <h1>Projet BlaBlaCar 2026</h1>
            <p>Mettez-vous bien avec le covoiturage au quotidien</p>
            </p>

        </div>
        <h1>Ajouts de 10 nouvelles réservations aléatoires :</h1>

        <?php
        foreach ($results as $reservation) {
            echo (" Nouvelle réservation sur le trajet ".$reservation['ville_depart']." --->".$reservation['ville_arrivee']. " par ".$reservation['prenom']." " .$reservation['nom']. ". </p>");
        }
        ?>
        <p/>

    </div>   


    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    <!-- ----- fin de la page viewAcceuil -->

</body>
</html>