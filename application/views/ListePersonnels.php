<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
</head>
<body>
    <h2>La liste des personnels :</h2>
    <table border=2>
        <thead>

            <tr> 
                <th>Nom</th>
                <th>Date De Naissance</th>
                <th>Email</th>
                <th>Date d'embauche</th>
                <th>Genre</th>
                <th>Direction</th>
                <th>Fonction</th>
                <th>Statut</th> 
                
            </tr>
        </thead>
        <tbody>

            <?php if (!empty($persos)) { ?>
                <?php foreach ($persos as $perso) { ?>
                    <tr>
                        <td><?= $perso->nom ?></td>
                        <td><?= $perso->datedenaissance ?></td>
                        <td><?= $perso->email ?></td>
                        <td><?= $perso->datedembauche ?></td>
                        <td><?= $perso->genre ?></td>
                        <td><?= $perso->direction ?></td>
                        <td><?= $perso->fonction ?></td>
                        <td><?= $perso->statut ?></td>
                    </tr>
        <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="7">Aucune donnée disponible.</td>
            </tr>
            <?php } ?>
        </tbody>
        </table>

        <a href="<?php echo site_url('CT_accueil/index') ?>"><h4>Retour</h4></a>
</body>