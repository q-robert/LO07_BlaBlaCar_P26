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
        <?php 
        if ($value==TRUE){
            echo("Votre réservation à bien été prise en compte.");
        } else {
            echo("Votre réservation n'a pas été prise en compte, merci de refaire la demande !");
        }
        ?>
        </div>
        <p/>
       
    </div>   


    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>

    <!-- ----- fin de la page viewAcceuil -->

</body>
</html>