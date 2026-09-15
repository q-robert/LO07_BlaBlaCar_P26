
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
            <h1>On dirait pas comme ça mais j'ai des supers idées d'amélioration du MVC :</h1>
            <p>
                On peut directement taper une url correcte dans le action.php?= , si l'action est valide, 
                on est envoyé sur la page correspondante au action même si on n'est pas connecté avec le rôle correspondant.
                Pour y remédier, on peut mettre en place un système dans le routeur qui vérifie si l'on est connecté (regarde role)
                et chaque action correspondant à un rôle serait dans un if accesible seulement avec son role (if 'role' = 'conducteur').
            </p>
        </div>
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewAjouterConducterAction -->    


</body>
</html>
