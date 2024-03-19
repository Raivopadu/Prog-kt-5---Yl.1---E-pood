<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $tootenimi = $_POST['tootenimi'];
    $tootehind = $_POST['tootehind'];
    $tootepilt = $_POST['tootepilt']; // Pildi nime saamine
    
    // Loome rea, mis sisaldab tootenime, tootehinna ja pildifaili nime
    $rida = array($tootenimi, $tootehind, $tootepilt);

    // Avame CSV-faili lisamiseks
    $csv = fopen("tooted.csv", "a");

    // Lisame rea CSV-faili
    fputcsv($csv, $rida);

    // Sulgeme CSV-faili
    fclose($csv);

    // Suuname administraatori lehele, edastades sõnumi toote edukast lisamisest
    header("Location: admin.php?message=jah");
    exit;
} else {
    header("Location: admin.php?message=ei");
}
?>
