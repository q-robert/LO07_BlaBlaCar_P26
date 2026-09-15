
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
     echo ("<li>marque du vehicule " . $_POST['marque'] . "</li>");
     echo ("<li>modele du vehicule= " . $_POST['modele'] . "</li>");
     echo ("<li>annee du vehicule= " . $_POST['annee'] . "</li>");
     echo ("<li>immatriculation du vehicule= " . $_POST['immatriculation'] . "</li>");
     echo ("<li>propriétaire_id du vehicule= " . $_POST['proprietaire'] . "</li>");
     
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion de la vehicule</h3>");
     echo ("marque = " . $_POST['marque']);
     echo("</p>");
     echo ("id = " . $results);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewAjouterVilleAction -->    

    
    