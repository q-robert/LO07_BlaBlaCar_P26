
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
        <h1>Liste des passagers dans le trajet sélectionné : </h1>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">nom</th>
                    <th scope = "col">prenom</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des villes est dans une variable $results             
                foreach ($passagers as $passager) {
                    printf("<tr>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "</tr>",
                            $passager['nom'], $passager['prenom']);
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewAjouterVilleAction -->    


