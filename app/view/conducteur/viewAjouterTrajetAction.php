
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
    <?php
    if ($results!=-1) {
     echo ("<h3>Le nouveau vehicule a été ajouté </h3>");
     echo("<ul>");
     //echo ("<li>id = " . $results . "</li>");
     echo ("<li>ville de départ du trajet = " . $_POST['ville_depart'] . "</li>");
     echo ("<li>ville d'arrivée du trajet = " . $_POST['ville_arrivee'] . "</li>");
     echo ("<li>conducteur_id du trajet= " . $_SESSION['login_id'] . "</li>");
     echo ("<li>vehicule_id du trajet= " . $_POST['vehicule_id'] . "</li>");
     echo ("<li>prix du trajet = " . $_POST['prix'] . "</li>");
     echo ("<li>date de départ du trajet = " . $_POST['date_depart'] . "</li>");
     echo ("<li>heure de départ du trajet = " . $_POST['heure_depart'] . "</li>");
     echo ("<li>statut du trajet = actif </li>");
     
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion de la vehicule</h3>");
     echo ("Erreur dans l'ajout du trajet de = " . $_POST['ville_depart'] ." vers " . $_POST['ville_arrivee'] ."!!");
     echo("</p>");
     echo ("id = " . $results);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewAjouterVilleAction -->    

    
    