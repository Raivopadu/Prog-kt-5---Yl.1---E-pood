<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $tootenimi = $_POST['tootenimi'];
    $tootehind = $_POST['tootehind'];
    $tootepilt = $_FILES['tootepilt']['name'];

    
    $sihtkaust = "tooted/";

    $sihtfail = $sihtkaust . basename($tootepilt);


    if (move_uploaded_file($_FILES['tootepilt']['tmp_name'], $sihtfail)) {

       
        $rida = array($tootenimi, $tootehind, $tootepilt);

        $csv = fopen("tooted.csv", "a");

        fputcsv($csv, $rida);

        fclose($csv);

        header("Location: admin.php?message=Toode on edukalt lisatud!");
        exit;
        

    } else {

        header("Location: admin.php?message=Vabandame, toote lisamine ebaõnnestus!");
        exit;
        
    }
}
?>
