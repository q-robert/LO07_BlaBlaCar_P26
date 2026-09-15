
<!-- ----- début viewAjouterPassagerForm -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentMenu.php';
        include $root . '/app/view/fragment/fragmentJumbotron.html';
        ?> 
        <h1>Ajouter Passager</h1>
        </p>
        <form method="post" action="../../app/router/router1.php?action=ajouterPassagerAction">
            <div class="form-group">
                <input type="hidden" name='action'>        
                <label class='w-25' for="id">nom : </label><input type="text" name='nom' required> 
                </p>                          
                <label class='w-25' for="id">prenom : </label><input type="text" name='prenom' required> 
                </p> 
                <label class='w-25' for="id">solde initial : </label><input type="number" min="0" step='any' name='solde' required>          
            </div>
            <p/>
            <br/> 
            <input type="reset"></input>
            <input type="submit"></input>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

    <!-- ----- fin viewAjouterPassagerForm -->



