<?php
// laeb tooted.csv failist andmed
function laeToodeteAndmed() {
    $tooted = array(); 
    if (($handle = fopen("tooted.csv", "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $tooted[] = $data;
        }
        fclose($handle);
    }
    return $tooted;
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kustuta'])) {
    if (isset($_POST['valitud_tooted'])) {
        $valitud_tooted = $_POST['valitud_tooted'];
        $tooted = laeToodeteAndmed(); 
        foreach ($valitud_tooted as $toode) {
           
            unset($tooted[$toode]);
        }
        
        $csv = fopen("tooted.csv", "w");
        foreach ($tooted as $toode) {
            fputcsv($csv, $toode);
        }
        fclose($csv);
      
        header("Location: admin.php?message=kustutatud");
        exit;
    } else {
     
        header("Location: admin.php?message=mittekustutatud");
        exit;
    }
}
?>
