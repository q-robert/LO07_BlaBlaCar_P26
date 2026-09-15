
<!-- ----- début viewAllUtilisateur -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';

      ?>
      <h1>Tableau de tous les utilisateurs</h1>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <!--<th scope = "col">id</th>-->
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">role</th>
          <th scope = "col">login</th>
          <th scope = "col">password</th>
          <th scope = "col">solde</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr>"
                   //. "<td>%d</td>"
                   . "<td>%s</td>"
                   . "<td>%s</td>"
                   . "<td>%s</td>"
                   . "<td>%s</td>"
                   . "<td>%s</td>"
                   . "<td>%f</td>"
                   . "</tr>", 
             /*$element->getId(),*/ $element->getNom(), $element->getPrenom(), $element->getRole(), $element->getLogin(), $element->getPassword(), $element->getSolde());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAllUtilisateur -->
  
  
  