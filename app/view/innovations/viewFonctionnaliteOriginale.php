
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
            <h1>On dirait pas comme ça mais j'ai des supers idées de fonctionnalités originales :</h1>
            <p>
                Si un trajet chez un client reviens souvent, proposez une version préconstruite du trajet.
            </p>
        </div>
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewAjouterConducterAction -->    



</body>
</html>