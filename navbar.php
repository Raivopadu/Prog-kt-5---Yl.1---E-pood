<div class="container-fluid taust">  <!--Tausta kontainer-->


        <div class="container peamine"> <!--Põhi kontainer-->


       <nav class="navbar navbar-expand-lg navbar-light ">  <!--NAVBAR START -->

  <div class="container-fluid">

    <a href="index.php?leht=avaleht" class="navbar-brand">Raivopadu.com</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="index.php?leht=avaleht" class="nav-link <?php echo (isset($_GET['leht']) && $_GET['leht'] == 'avaleht') ? 'active' : ''; ?>">Avaleht</a>
        </li>


       

        <li class="nav-item">
        <a  href="index.php?leht=tooted" class="nav-link <?php echo (isset($_GET['leht']) && $_GET['leht'] == 'tooted') ? 'active' : ''; ?>" >Tooted</a>

       
        </li>
        <li class="nav-item"> <!--Superglobaalne_masiivi_element-->
          <a href="index.php?leht=kontakt"  class="nav-link  <?php echo (isset($_GET['leht']) && $_GET['leht'] == 'kontakt') ? 'active' : ''; ?>">Kontakt</a>
        </li>
        <li class="nav-item">
          <a href="index.php?leht=admin" class="nav-link <?php echo (isset($_GET['leht']) && $_GET['leht'] == 'admin') ? 'active' : ''; ?>">Admin</a>
        </li>

        <li class="nav-item vert_keskel">
            <a href="index.php?leht=ostukorv" class="nav-link vert_keskel <?php echo (isset($_GET['leht']) && $_GET['leht'] == 'ostukorv') ? 'active' : ''; ?>">

                <img src="data/<?php echo(isset($_GET['leht']) && $_GET['leht'] == 'ostukorv') ? 'sba.png' : 'sb.png';?>" alt="ostukorv" width="18px" height="18px">
           
              </a>
        </li>


      </ul>
    </div>


  </div>
</nav> <!--NAVBAR END-->



<!-- TEKST PÄISES, NUPP JA PILT -->


<div class="container" style="padding-top:5%">
  <div class="row">
    <div class="col-md-6">
      <div class="d-flex align-items-center h-100">
        <div>
          <div class="h1">Super ale <br>-20 % Kõik tooted!</div>
          
          <div class="lead" style="margin-top:2%;margin-bottom:5%;">Kasuta ilma taustata pilti ja kindlasti võta kasutusse BS5!</div>
          
          <button class="btn btn-danger rounded-pill">Vaata pakkumisi! →</button>
        </div>
      </div>
    </div>
    <div class="col-md-6 d-flex align-items-end justify-content-end h-100" style="text-align:right">
      <img src="data/image1.png" alt="Pilt" class="image-fluid suurus"> 
    </div>
  </div>
</div>




        
    
    
    </div> 




    </div> 