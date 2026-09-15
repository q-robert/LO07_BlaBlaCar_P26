
<!-- ----- début viewAjouterVilleForm -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?> 
        <h1>Ajouter Ville</h1>
        </p>
        <form method="post" action="../../app/router/router1.php?action=ajouterVilleAction">
            <div class="form-group">
                <input type="hidden" name='action'>        
                <label class='w-25' for="id">nom de la ville : </label><input type="text" name='nom' required>                                   
            </div>
            <p/>
            <br/> 
            <input type="reset"></input>
            <input type="submit"></input>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewAjouterVilleForm -->



