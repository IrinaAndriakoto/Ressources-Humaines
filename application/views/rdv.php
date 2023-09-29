<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RDV</title>
</head>
<body>
	<h2>Les horaires disponibles :</h2>
<ul>
    <?php foreach ($horaires_dispo as $horaire) { ?>
        <li> <h5>
            <?= $horaire->jour ?> :
            <?= $horaire->debut ?> - <?= $horaire->fin ?>
            ( <?= $horaire->nom_personnel ?>)
			</h5>
			<form method="post" action="<?= site_url('CT_rdv/confirmer_rdv') ?>">
                <input type="hidden" name="horaire_id" value="<?= $horaire->id ?>">
                <input type="submit" value="Prendre RDV">
            </form>
		</li>
    <?php } ?>
</ul>
</body>
</html>