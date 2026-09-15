<!-- ----- début fragmentMenu -->
<nav class="navbar navbar-expand-lg bg-success fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router1.php?action=viewBlaBlaCarAccueil"> 
            <?php
            if (isset($_SESSION['role'])) {
                echo ("KLEIN et ROBERT | " . $_SESSION['nom'] ." ". $_SESSION['prenom'] . " | " . $_SESSION['solde'] . " | ");
            } else {
                echo("KLEIN et ROBERT | ");
            }
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <?php
                if (isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'administrateur') {
                        ?>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Administrateur</a>

                            <ul class='dropdown-menu'>
                                <li><a class='dropdown-item' href='router1.php?action=utilisateurListe'>Liste des utilisateurs</a></li>
                                <li><a class='dropdown-item' href='router1.php?action=ajouterConducteurForm'>Ajout d'un conducteur</a></li>
                                <li><a class='dropdown-item' href='router1.php?action=ajouterPassagerForm'>Ajout d'un passager</a></li> 
                                <hr>
                                <li><a class='dropdown-item' href='router1.php?action=vehiculeListe'>Liste des véhicules</a></li>
                                <li><a class='dropdown-item' href='router1.php?action=ajouterVehiculeForm'>Ajout d'un véhicule</a></li> 
                                <hr>
                                <li><a class='dropdown-item' href='router1.php?action=villeListe'>Liste des villes</a></li>
                                <li><a class='dropdown-item' href='router1.php?action=ajouterVilleForm'>Ajout d'une ville</a></li> 
                            </ul>
                        </li>
                        <?php
                    } elseif ($_SESSION["role"] == 'conducteur') {
                        ?>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Conducteur</a>
                            <ul class='dropdown-menu'>
                                <li><a class='dropdown-item' href='router1.php?action=conducteurVehiculeListe'>Liste de mes véhicules</a></li>
                                <hr>
                                <li><a class='dropdown-item' href='router1.php?action=conducteurTrajetListe'>Liste de tous mes trajets (actifs et passifs)</a></li>
                                <li><a class='dropdown-item' href='router1.php?action=conducteurAjouterTrajetForm'>Ajout d'un trajet</a></li> 
                                <hr>
                                <li><a class='dropdown-item' href='router1.php?action=conducteurListePassagerTrajetForm'>Liste des passagers de l'un de mes trajets actifs</a></li> 
                                <li><a class='dropdown-item' href='router1.php?action=conducteurCloturerTrajetForm'>Cloturer l'un de mes trajets actifs</a></li> 
                            </ul>
                        </li>  

                        <?php
                    } elseif ($_SESSION["role"] == 'passager') {
                        ?>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Passager</a>
                            <ul class='dropdown-menu'>
                                <li><a class='dropdown-item' href='router1.php?action=passagerListeReservation'>Liste de mes réservations</a></li>
                                <li><a class='dropdown-item' href='router1.php?action=passagerReserverTrajetActifForm'>Réservation d'un trajet actif</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                }
                ?>


                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Innovations</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router1.php?action=proposezFonctionnaliteOriginale'>Proposez une fonctionnalité originale</a></li>
                        <li><a class='dropdown-item' href='router1.php?action=proposezAmeliorationMVC'>Proposez une amélioration du code MVC</a></li>
                    </ul>
                </li>

                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Examinateur</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router1.php?action=superGlobales'>SuperGlobales (Cookies et Session) </a></li>
                        <li><a class='dropdown-item' href='router1.php?action=ajout10ReservationsAleatoires'>Ajout de 10 réservations aléatoires</a></li>
                    </ul>
                </li>

                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Se connecter</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router1.php?action=login'>Login</a></li>
                        <li><a class='dropdown-item' href='router1.php?action=deconnexion'>Deconnexion</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

