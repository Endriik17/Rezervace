<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seznam rezervací</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            width: 100%;
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
        }
        main {
        flex: 1;
        padding: 20px;
        }
        .container {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        width: 100%;  
        min-height: 100vh;
        }
        table {
            border-collapse: collapse;
            width: 95%;
            height: 100%;
            padding: 20px;
            margin: 0 auto;
            position: relative;
            margin-top: 100px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            padding: 30px;
        }
        header {
            width: 100%;
            background-image: url("../obrazky/header.jpg");
            position: relative;
            top: 0;
            border-bottom: 2px solid #FF1D18;
        }
        h1{
            font-size: 3vw;
            background-image: linear-gradient(to left, #FF1D18, #FF0500);
            color: transparent;
            background-clip: text;
            text-align: center;
        }
        nav {
        display: flex;
        justify-content: center;
        }
        nav a {
            color: #FF474C;
            font-size: 1vw;
            text-align: center;
            padding: 5px 10px;
            border-radius: 5px; 
        }
        a {
            text-decoration: none;
        }
        a:hover {
            color: whitesmoke;
            text-shadow: 1px 1px black;
            background-color: rgba(255, 255, 255, 0.1);
        }
        #vlevo {
            padding: 20px;
            float: left;
            width: 31%;
        }
        #stred {
            padding: 20px;
            float: left;
            width: 31%;
        }
        #vpravo {
            padding: 20px;
            float: left;
            width: 31%;
        }
        footer {
            color: #cccccc;
            width: 100%;
            background-image: url("../obrazky/footer.jpg");
            position: relative;
            text-align: center;
        }
        footer a {
            color: #cccccc;
        }
        #kontakty {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
<div class="container">
    <header>
        <h1>Seznam rezervací</h1>
        <nav>
            <a href="./rezervace.php" id="vlevo">Rezervace</a>
            <a href="#kontakty" id="stred">Kontakty</a>
            <a href="./seznamrez.php" id="vpravo" target="_blank">Seznam rezervací</a>
        </nav>
    </header>
</body>
</html>
<main>
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
                        <td><?= ($rezervacex['id']) ?></td>
                        <td><?= htmlspecialchars($rezervacex['nazevmist']) ?></td>
                        <td><?= ($rezervacex['datum']) ?></td>
                        <td><?= ($rezervacex['casod']) ?> – <?= ($rezervacex['casdo']) ?></td>
                        <td><?= htmlspecialchars($rezervacex['jmeno']) ?></td>
                        <td><?= htmlspecialchars($rezervacex['prijmeni']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Žádné rezervace nebyly nalezeny.</p>
    <?php endif; ?>
</main>
<footer>
    <div id="kontakty">
        <div id="vlevo">
        <p>Email: bohacm17@gmail.com</p>
        <p>Telefon: +420 736 447 365</p>
        </div>
        <div id="stred">
        <a href="https://cs.wikipedia.org/wiki/FAQ">Často kladené dotazy</a> <br><br>
        <a href="https://en.wikipedia.org/wiki/General_Data_Protection_Regulation">Ochrana osobních údajů</a>
        </div>
        <div id="vpravo">
        <p>&copy; 2024, Martin Boháč</p>
        <p>Design: Martin Boháč</p>
        </div>
    </div>   
</footer>
</div>
