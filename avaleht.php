

<div class="container peamine text-center">

<div class="h2" style="margin-top:4%;margin-bottom:3%;">Parimad pakkumised</div>




<div class="container">
    <div class="row">
        <?php
        $row_count = 0; 
        if (($handle = fopen("tooted.csv", "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $row_count++; 

             
                if ($row_count > 1 && ($row_count - 1) % 4 == 0) {
                    echo '</div><div class="row">'; 
                }
        ?>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="tooted/<?php echo $data[2]; ?>" class="card-img-top" alt="<?php echo $data[0]; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data[0]; ?></h5>
                            <p class="card-text"><?php echo $data[1]; ?> €</p>
                        </div>
                    </div>
                </div>
        <?php
            }
            fclose($handle);
        }
        ?>
    </div>
</div>



</div>


