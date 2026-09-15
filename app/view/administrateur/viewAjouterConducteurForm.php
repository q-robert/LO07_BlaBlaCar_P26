
<!-- ----- début viewAjouterConducteurForm -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?> 
        <h1>Ajouter Conducteur</h1>
        </p>
        <form method="post" action="../../app/router/router1.php?action=ajouterConducteurAction">
            <div class="form-group">
                <input type="hidden" name='action'>        
                <label class='w-25' for="id">nom : </label><input type="text" name='nom' required> 
                </p>                          
                <label class='w-25' for="id">prenom : </label><input type="text" name='prenom' required> 
                </p> 
                <label class='w-25' for="id">solde initial : </label><input type="number" step='any' min="0" name='solde' required>         
            </div>
            <p/>
            <br/> 
            <input type="reset"></input>
            <input type="submit"></input>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewAjouterConducteurForm -->



