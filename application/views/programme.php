<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programme d'entretien</title>
</head>
<body>
    <p>Rendez-vous confirme</p>
    <h3 style="text-decoration:underline;">Programme:</h3>
    <table border=1 >
        <thead>
            <tr>
                <th>Jour</th>
                <th>Heure de début</th>
                <th>Nom du candidat</th>
                <th>Nom du personnel</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($programme_data as $row) { ?>
                <tr>
                    <td><?= $row->jour ?></td>
                    <td><?= $row->debut ?></td>
                    <td><?= $row->candidat ?></td>
                    <td><?= $row->nom ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>