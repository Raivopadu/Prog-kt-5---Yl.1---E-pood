<?php
// Funktsioon, mis laeb tooted.csv failist andmed
function laeToodeteAndmed() {
    $tooted = array(); // Siia salvestame tooted.csv failist saadud andmed
    if (($handle = fopen("tooted.csv", "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $tooted[] = $data;
        }
        fclose($handle);
    }
    return $tooted;
}

// Kui vorm on esitatud ja kustutamisnupp on klõpsatud
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kustuta'])) {
    if (isset($_POST['valitud_tooted'])) {
        $valitud_tooted = $_POST['valitud_tooted'];
        $tooted = laeToodeteAndmed(); // Lae tooted.csv failist andmed
        foreach ($valitud_tooted as $toode) {
            // Kustuta valitud tooted vastavalt indeksile
            unset($tooted[$toode]);
        }
        // Salvesta muudetud andmed tooted.csv faili
        $csv = fopen("tooted.csv", "w");
        foreach ($tooted as $toode) {
            fputcsv($csv, $toode);
        }
        fclose($csv);
        // Suuname administraatori lehele, edastades sõnumi toote edukast kustutamisest
        header("Location: admin.php?message=kustutatud");
        exit;
    } else {
        // Kui ühtegi toodet pole valitud, suuname tagasi administraatori lehele koos hoiatussõnumiga
        header("Location: admin.php?message=mittekustutatud");
        exit;
    }
}
?>
