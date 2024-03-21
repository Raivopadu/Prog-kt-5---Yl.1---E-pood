<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $tootenimi = $_POST['tootenimi'];
    $tootehind = $_POST['tootehind'];
    $tootepilt = $_POST['tootepilt']; 
    
    
    $rida = array($tootenimi, $tootehind, $tootepilt);

   
    $csv = fopen("tooted.csv", "a");

    fputcsv($csv, $rida);

   
    fclose($csv);

    
    header("Location: admin.php?message=jah");
    exit;
} else {
    header("Location: admin.php?message=ei");
}
?>
