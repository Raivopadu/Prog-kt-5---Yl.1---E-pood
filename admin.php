<?php


include_once('header.php');
include_once('navbar.php');
?>



<div class="container peamine ruumi">


<?php
if (isset($_GET['message'])) {
    echo '<div class="alert alert-success" role="alert">' . $_GET['message'] . '</div>';
}
?>





  <form action="lisatoode.php" method="post" enctype="multipart/form-data">

    <div class="form-group mb-4">

      <label for="tootenimi">Toote nimi:</label>
      <input type="text" class="form-control" name="tootenimi" required style="max-width:30%"> 
      
    </div>
    
    <div class="form-group mb-4">
      <label for="tootehind">Toote hind:</label>
      <input type="number" class="form-control" name="tootehind" required style="max-width:30%"> 
    </div>


    <div class="form-group mb-4">
        <label for="tootepilt">Vali toote pilt:</label>
        <input type="file" class="form-control-file" name="tootepilt" required accept="image/*">

    </div>

    <button type="submit" class="btn btn-primary">Lisa toode...</button>

  </form>










<?php
// Kood, mis laeb tooted.csv failist andmed
$tooted = array(); // Siia salvestame tooted.csv failist saadud andmed
if (($handle = fopen("tooted.csv", "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $tooted[] = $data;
    }
    fclose($handle);
}

// Kui vorm on esitatud ja kustutamisnupp on klõpsatud
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kustuta'])) {
    if (isset($_POST['valitud_tooted'])) {
        $valitud_tooted = $_POST['valitud_tooted'];
        foreach ($valitud_tooted as $toode) {
            // Kood, mis kustutab toote vastavalt $toode
            // Näiteks:
             unset($tooted[$toode]);
        }
        // Kood, mis salvestab muudetud andmed tooted.csv faili
        // Näiteks:
         $csv = fopen("tooted.csv", "w");
         foreach ($tooted as $toode) {
             fputcsv($csv, $toode);
         }
         fclose($csv);
        echo '<div class="alert alert-success" role="alert">Valitud tooted on kustutatud!</div>';
    } else {
        echo '<div class="alert alert-warning" role="alert">Valige vähemalt üks toode, mida kustutada!</div>';
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <?php if (!empty($tooted)) : ?>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Tootenimi</th>
                    <th>Tootehind</th>
                    <th>Tootepilt</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tooted as $index => $toode) : ?>
                    <tr>
                        <td><input type="checkbox" name="valitud_tooted[]" value="<?php echo $index; ?>"></td>
                        <td><?php echo $toode[0]; ?></td>
                        <td><?php echo $toode[1]; ?></td>
                        <td><?php echo $toode[2]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-danger" name="kustuta">Kustuta valitud</button>
    <?php else : ?>
        <div class="alert alert-info" role="alert">Tooteid pole saadaval.</div>
    <?php endif; ?>
</form>


</div>


<?php
    include_once('footer.php');

    ?>



