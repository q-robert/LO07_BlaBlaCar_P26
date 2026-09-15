
<!-- ----- début viewAjouterPassagerAction -->
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
     echo ("<h3>Le nouveau passager a été ajouté </h3>");
     echo("<ul>");
     //echo ("<li>id = " . $results . "</li>");
     echo ("<li>nom = " . $_POST['nom'] . "</li>");
     echo ("<li>prenom = " . $_POST['prenom'] . "</li>");
     echo ("<li>prenom = " . $_POST['solde'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du passager</h3>");
     echo ("nom = " . $_POST['nom']);
     echo ("id = $results ");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewAjouterPassagerAction -->    

    
    