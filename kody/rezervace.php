<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Martin Boháč">
    <meta name="description" content="Systém pro rezervaci místnosti">
    <meta name="keywords" content="HTML, PHP, MySQL, rezervace">
    <title>Rezervace místnosti</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            width: 100%;
            font-family: Arial, sans-serif;
        }
        header {
            width: 100%;
            background-image: url("../obrazky/header.jpg");
            position: absolute;
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
        #zrusit {
            padding: 20px;
            float: left;
            width: 31%;
        }
        label {
            font-size: 200%;
            font-family: "Palladio", serif;
            color: whitesmoke;
            padding: 10px;
        }
        .pozadi {
            background-image: url("../obrazky/pozadi.jpg");
            background-color: #FFFFFF;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #submit1 {
            margin-left: 45%;
            padding: 20px;
        }
        #submit2 {
            margin-left: 40%;
            padding: 20px;
        }
        .strany {
            display: inline-flex;
            width: 100%;
            height: 100%;
            padding: 20px;
            margin: 20px;
            position: relative;
            margin-top: 350px;
        }
        .left {
            width: 50%;
            height: 50%;
            margin-left: 15%;
        }
        .right {
            width: 50%;
            height: 50%;
            margin-left: 5%;
        }
        .left input {
            width: 50%;
            padding: 12px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 3px outset #cccccc;
            -webkit-transition: 0.2s;
            transition: 0.2s;
            outline: none;
        }
        .left input:focus {
            border: 3px solid black;
        }
        a {
            text-decoration: none;
        }
        #kontakty {
            display: flex;
            justify-content: center;
        }
        footer {
            color: #cccccc;
            width: 100%;
            background-image: url("../obrazky/footer.jpg");
            position: relative;
        }
        footer a {
            color: #cccccc;
        }
        .zprava {
            color: green;
            text-shadow: 1px 1px #17F2B1;
            padding: 10px; 
            font-size: 30px; 
            font-family: "Copperplate", fantasy;
            margin-top: 30px; 
            text-align: center; 
        }
        .zpravaW {
            color: white;
            text-shadow: 1px 1px red;
            padding: 10px; 
            font-size: 20px; 
            font-family: "Copperplate", fantasy;
            margin-top: 30px; 
            text-align: center; 
        }
        .form2 h1 {
            margin-top: 150px;
        }
        input {
            background-color: white;
            color: black;
            padding: 10px 20px;
            border: 10px 10px black solid;
            cursor: pointer;
        }
        </style>
</head>
<body>
    <div class="container">
    <div class="pozadi">
    <header>
        <h1>Rezervační systém</h1>
        <nav>
            <a href="./rezervace.php" id="vlevo">Rezervace</a>
            <a href="#kontakty" id="stred">Kontakty</a>
            <a href="./seznamrez.php" id="vpravo" target="_blank">Seznam rezervací</a>
        </nav>
    </header>
    <form action="./rezervace.php" method="POST">
        <div class="strany">
        <section class="left">
        <div id="mistnosti">
        <label for="nazevmist" class="nm">Název místnosti:</label>
        <select name="nazevmist" id="nazevmist" value="<?php echo htmlspecialchars($_POST['nazevmist'] ?? ''); ?>">
            <option value="Konferenční místnost 1">Konferenční místnost 1</option>
            <option value="Konferenční místnost 2">Konferenční místnost 2</option>
            <option value="Konferenční místnost 3">Konferenční místnost 3</option>
            <option value="Ateliér 1">Ateliér 1</option>
            <option value="Ateliér 2">Ateliér 2</option>
            <option value="Kancelář 1">Kancelář 1</option>
            <option value="Kancelář 2">Kancelář 2</option>
            <option value="Kancelář 3">Kancelář 3</option>
            <option value="Klubovna 1">Klubovna 1</option>
            <option value="Klubovna 2">Klubovna 2</option>
        </select>
        </div>
        <div id="jmeno">
        <label for="jmeno" class="jm">Vaše jméno:</label>
        <input type="text" name="jmeno" id="jmeno" value="<?php echo htmlspecialchars($_POST['jmeno'] ?? ''); ?>" required>
        <br>
        <label for="prijmeni" class="pr">Vaše příjmení:</label>
        <input type="text" name="prijmeni" id="prijmeni" value="<?php echo htmlspecialchars($_POST['prijmeni'] ?? ''); ?>" required>
        </section>
        <section class="right">
        <div id="datum">
        <label for="datum" class="da">Datum rezervace:</label>
        <input type="date" name="datum" id="datum" value="<?php echo htmlspecialchars($_POST['datum'] ?? '');?>"  required>
        </div>
        <div id="cas">
        <label for="casod" class="caso">Čas od:</label>
        <input type="time" name="casod" id="casod" value="<?php echo htmlspecialchars($_POST['casod'] ?? ''); ?>" required>
        <label for="casdo" class="casd">Čas do:</label>
        <input type="time" name="casdo" id="casdo" value="<?php echo htmlspecialchars($_POST['casdo'] ?? ''); ?>" required>
        </div>
        </div>
        </section>
        <div id="submit1">
        <input type="submit" name="rezervace" value="Rezervovat místnost">
        </div>
        </form>
</body>
</html>
<?php
$chyby = [];
$slozka = 'rezervace.json';
$rezervace = [];
$zvolenydatum = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nazevmist = isset($_POST['nazevmist']) ? $_POST['nazevmist'] : '';
    $jmeno = trim(htmlspecialchars(strip_tags(isset($_POST['jmeno']) ? $_POST['jmeno'] : '')));
    $prijmeni = trim(htmlspecialchars(strip_tags(isset($_POST['prijmeni']) ? $_POST['prijmeni'] : '')));
    $datum = isset($_POST['datum']) ? $_POST['datum'] : '';
    $casod = isset($_POST['casod']) ? $_POST['casod'] : '';
    $casdo = isset($_POST['casdo']) ? $_POST['casdo'] : '';


    if ($casdo < $casod) {
        $chyby[] = "Čas do nemůže být menší než čas od!";
    }
    if (!empty($datum)) {
        $zadanydatum = DateTime::createFromFormat('Y-m-d', $datum);
        $ted = new DateTime();
        if ($zadanydatum && $zadanydatum < $ted) {
            $chyby[] = "Datum rezervace musí být v budoucnu.";
        } else {
            $zvolenydatum = $zadanydatum->format('d. m. Y');
        }
    }
    if (file_exists($slozka)) {
        $dataslozky = file_get_contents($slozka);
        $rezervace = json_decode($dataslozky, true) ?? [];
    }
    else {
        $rezervace = [];
    }
    foreach ($rezervace as $existujici) {
        if (
            $existujici['nazevmist'] === $nazevmist &&
            $existujici['datum'] === $zvolenydatum &&
            !($casdo <= $existujici['casod'] || $casod >= $existujici['casdo'])
        ) {
            $chyby[] = "V této místnosti je již rezervace od {$existujici['casod']} do {$existujici['casdo']}.";
            break;
        }
    }
    
    if(empty($chyby) && isset($_POST['rezervace'])) {
    $noveid = count($rezervace) > 0 ? max(array_column($rezervace, 'id')) + 1 : 1;
    $novarezervace = [
        "id" => $noveid,
        "nazevmist" => $nazevmist,
        "jmeno" => $jmeno,
        "prijmeni" => $prijmeni,
        "datum" => $zvolenydatum,
        "casod" => $casod,
        "casdo" => $casdo
    ];

    $rezervace[] = $novarezervace;

    file_put_contents($slozka, json_encode($rezervace, JSON_PRETTY_PRINT));
}

if(empty($novarezervace)) {
    echo "";
} else {
    echo "<div class='zprava'>Rezervace byla úspěšně vytvořena s ID $noveid.</div>";
}
if (!empty($chyby)) {
    foreach ($chyby as $chyba) {
        echo "<div class='zpravaW'>$chyba</div>";
    }
}
}
?>
<form method="POST" action="rezervace.php">
    <div class="form2">
    <h1>Zrušit rezervaci</h1>
    <div id="submit2">
    <br>
    <label for="idsmazat">ID rezervace: </label>
    <input type="number" id="idsmazat" name="idsmazat" required>
    <br>
    </div>
    <div id="submit1">
    <input type="submit" name="zruseni" value="Zrušit rezervaci">
    </div>
    </div>
</form>
<?php
$slozka = 'rezervace.json';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idsmazat'])) {
    $idsmazat = intval($_POST['idsmazat']); 
    if (file_exists($slozka)) {
        $dataslozky = file_get_contents($slozka);
        $rezervace = json_decode($dataslozky, true);
        
        if (is_array($rezervace)) {
            $idExistuje = false;
                foreach ($rezervace as $rezervacex) {
                    if (isset($rezervacex['id']) && $rezervacex['id'] === $idsmazat) {
                        $idExistuje = true;
                        break;
                    }
                }
            if ($idExistuje) {
                $rezervace = array_filter($rezervace, function ($rezervacex) use ($idsmazat) {
                    return $rezervacex['id'] !== $idsmazat;
                });
            $rezervace = array_values($rezervace);

            file_put_contents($slozka, json_encode(array_values($rezervace), JSON_PRETTY_PRINT));
            if($idsmazat>0) {
                echo "<div class='zprava'>Rezervace s ID $idsmazat byla úspěšně zrušena.</div>";
            } else {
                echo "<div class='zpravaW'>ID rezervace musí být větší než nula.</div>";
            }
        } else {
            echo "<div class='zpravaW'>Chyba při čtení dat.</div>";
        }
    } else {
        echo "<div class='zpravaW'>Soubor rezervací neexistuje.</div>";
    }
}
}
?>
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
