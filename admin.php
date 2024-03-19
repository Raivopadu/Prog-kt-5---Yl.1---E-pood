<?php
include_once('header.php');
include_once('navbar.php');
?>



<div class="container peamine ruumi">

    <?php

    $lisatud = "Toote lisamine õnnestus!"; /* Teated toote lisamise kohta*/
    $mittelisatud ="Toote lisamine ei õnnestunud!";
    $kustutatud = "Toode kustutamine õnnestus!";
    $mittekustutatud = "Toote kustutamine ei õnnestunud!";


    if (isset($_GET['message'])) {

        if ($_GET['message'] == 'jah') {
            echo '<div class="alert alert-success ruumip" role="alert">' .$lisatud. '</div>';
        } 
        if ($_GET['message'] == 'ei') {
            echo '<div class="alert alert-danger ruumip" role="alert">' .$mittelisatud. '</div>';
        }
        
    }
    ?>



    <form action="lisatoode.php" method="post" enctype="multipart/form-data"> <!--TOOTE LISAMISE FORM-->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-4">
                    <label for="tootenimi">Toote nimi:</label>
                    <input type="text" class="form-control" name="tootenimi" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-4">
                    <label for="tootehind">Toote hind:</label>
                    <input type="number" class="form-control" name="tootehind" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-4">
                    <label for="tootepilt">Vali toote pilt:</label>
                    <select class="form-control" name="tootepilt" required>
                        <?php
                        $pildid = scandir("./tooted/");
                        foreach ($pildid as $pilt) {
                            if (!in_array($pilt, array(".", ".."))) {
                                echo "<option value=\"$pilt\">$pilt</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lisa toode...</button>
    </form>


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

// Funktsioon, mis kuvab tooted tabelis ja lisab valikuvõimaluse kustutamiseks
function kuvaTooted() {
    $tooted = laeToodeteAndmed(); // Lae tooted.csv failist andmed
    if (!empty($tooted)) {
        echo '<table class="table">';
        echo '<thead><tr><th></th><th>Tootenimi</th><th>Tootehind</th><th>Tootepilt</th></tr></thead>';
        echo '<tbody>';
        foreach ($tooted as $index => $toode) {
            echo '<tr>';
            echo '<td><input type="checkbox" name="valitud_tooted[]" value="' . $index . '"></td>';
            echo '<td>' . $toode[0] . '</td>';
            echo '<td>' . $toode[1] . '</td>';
            echo '<td>' . $toode[2] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        // Kui tooteid pole saadaval, kuvatakse vastav hoiatussõnum
        echo '<div class="alert alert-info" role="alert">Tooteid pole saadaval.</div>';
    }
}
?>





    <?php
 


    if (isset($_GET['message'])) {

        if ($_GET['message'] == 'kustutatud') {
            echo '<div class="alert alert-success ruumip" role="alert">' .$kustutatud. '</div>';
        } 
        if ($_GET['message'] == 'mittekustutatud') {
            echo '<div class="alert alert-danger ruumip" role="alert">' .$mittekustutatud. '</div>';
        }
        
    }






    ?>
    <form action="kustutatoode.php" method="post">
        <?php kuvaTooted(); ?>
        <button type="submit" class="btn btn-danger" name="kustuta">Kustuta valitud</button>
    </form>








</div>

<?php
include_once('footer.php');
?>
