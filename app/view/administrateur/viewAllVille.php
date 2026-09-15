
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
      <h1>Tableau de toutes les villes</h1>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <!--<th scope = "col">id</th>-->
          <th scope = "col">nom des villes</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des villes est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr>"
                   //. "<td>%d</td>"
                   . "<td>%s</td>"
                   . "</tr>", 
             /*$element->getId(),*/ $element->getNom());
          }
          ?>
      </tbody>
    </table>
      <br>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAllVille -->
  
  
  