<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rendez-vous</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/rdv.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Ressources humaines</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="confirmer">
        <h4>Les horaires disponibles :</h4>
        
            <?php foreach ($horaires_dispo as $horaire) { ?>
                 <h5>
                    <?= $horaire->jour ?> :
                    <?= $horaire->debut ?> - <?= $horaire->fin ?>
                    ( <?= $horaire->nom_personnel ?>)
                </h5>
                <form method="post" action="<?= site_url('CT_rdv/confirmer_rdv') ?>">
                    <input type="hidden" name="horaire_id" value="<?= $horaire->id ?>">
                    <!-- Ajoutez des champs cachés pour stocker les ID -->
                    <input type="hidden" name="id_candidat" value="<?= $id_candidat ?>">
                    <input type="hidden" name="id_dispo" value="<?= $horaire->id ?>">
                    <input type="hidden" name="id_personnel" value="<?= $horaire->idpersonnel ?>">
                    <input type="submit" value="Prendre rendez-vous">
                </form>
            
            <?php } ?>
        
    </div>
    <div class="annuler">
        <h4>Le rendez-vous que vous avez confirme :</h4>
            
                <?php foreach ($horaires_non_dispo as $horaire) { ?>
                     <h5>
                        <?= $horaire->jour ?> :
                        <?= $horaire->debut ?> - <?= $horaire->fin ?>
                        ( <?= $horaire->nom_personnel ?>)
                    </h5>
                    <form method="post" action="<?= site_url('CT_rdv/annuler_rdv') ?>">
                        <input type="hidden" name="horaire_id" value="<?= $horaire->id ?>">
                        <input type="submit" value="Annuler le rendez-vous">
                    </form>
                
                <?php } ?>
             
    </div>
</body>
</html>