<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seznam rezervací</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Seznam rezervací</h1>
    
</body>
</html>

<?php 
$slozka = 'rezervace.json';
if (file_exists($slozka)) {
    $dataslozky = file_get_contents($slozka);
    if ($dataslozky === false) {
        die("Chyba: Nelze načíst soubor $slozka.");
    }

    $rezervace = json_decode($dataslozky, true);

    if ($rezervace == null && json_last_error() !== JSON_ERROR_NONE) {
        die("Data v souboru $slozka nejsou platný JSON. Chyba: " . json_last_error_msg());
    }
} else {
    echo "Chyba: Soubor $slozka neexistuje.";
}
?>
<?php 
if (!empty($rezervace)): 
?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Název místnosti</th>
                    <th>Datum</th>
                    <th>Časový úsek</th>
                    <th>Jméno rezervace</th>
                    <th>Příjmení rezervace</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rezervace as $rezervacex): ?>
                    <tr>
                        <td><?= htmlspecialchars($rezervacex['id']) ?></td>
                        <td><?= htmlspecialchars($rezervacex['nazevmist']) ?></td>
                        <td><?= htmlspecialchars($rezervacex['datum']) ?></td>
                        <td><?= htmlspecialchars($rezervacex['casod']) ?> – <?= htmlspecialchars($rezervacex['casdo']) ?></td>
                        <td><?= htmlspecialchars($rezervacex['jmeno']) ?></td>
                        <td><?= htmlspecialchars($rezervacex['prijmeni']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Žádné rezervace nebyly nalezeny.</p>
    <?php endif; ?>