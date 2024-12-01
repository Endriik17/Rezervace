# Rezervace
Rezervační systém pro rezervaci místností

Systém napsaný v programovacím jazyce php s přídavky dalších jazyků funguje jako webová stránka pro rezervaci.
! Systém umožňuje rezervovat místnosti až na druhý den, nelze si rezervovat místnost ve stejný den jako vyplňujete rezervaci.
Programovací jazyky: PHP, HTML, CSS
Databáze: rezervace.json
Soubory potřebné k funkčnosti stránky: https://github.com/Endriik17/Rezervace

Na hlavní stránce (tzn. rezervace.php) naleznete formuláře na rezervaci a zrušení rezervace, kam se zadává ID rezervace.
Seznam rezervací najdete v navigaci na hlavní stránce, po prokliknutí vyskočí stránka s tabulkou, ve které jsou zapsané všechny rezervace.
Všechny rezervace se ukládají do souboru .JSON, který data udřzuje a nechává php s nimi pracovat.
! V případě, že vám stránka nevyskočí nebo vypíše error, prvně se ujistěte, že máte všechny potřebné soubory stažené.

Na spuštění stránky na lokálním počítači je potřeba mít program XAMPP a v něm puštěný Apache (server pro webové stránky), na stránku se dostaneme pomocí adresy localhost

Made by Martin Boháč

![preview](https://github.com/user-attachments/assets/da2c3b0e-e9db-4257-81f3-6c9f6813c429)
