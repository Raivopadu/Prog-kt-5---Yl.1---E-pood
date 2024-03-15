<?php include ("header.php");?>

<body>




<?php

if (!isset($_GET['leht'])) {

    $_GET['leht'] = 'avaleht';
}

?>

<?php include ("navbar.php");?>










<?php

if(!empty($_GET["leht"])){

  $leht = htmlspecialchars($_GET["leht"]);
  
  if(is_file($leht.".php")){
  
    include($leht.".php");
  } else {
  
    echo "Valitud lehte ei leitud";
  
  }
  
}


?>






<?php include ("footer.php");?>

   
       






