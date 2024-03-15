<div class="container-fluid taust">  <!--Tausta kontainer-->


        <div class="container peamine"> <!--Põhi kontainer-->


       <nav class="navbar navbar-expand-lg navbar-light ">  <!--NAVBAR START -->

  <div class="container-fluid">

    <a class="navbar-brand" href="#">Raivo Padu</a>

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
                <img src="data/sb.png" alt="ostukorv" width="18px" height="18px">
            </a>
        </li>


      </ul>
    </div>


  </div>
</nav> <!--NAVBAR END-->







        
    
    
    </div> <!--Põhi kontaineri lõpp -->




    </div> <!--Tausta kontaineri lõpp-->