<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-size: 32px"><img src="img/logo.png" style="width: 50px; height: 50px;"> <b>Criminology Reviewer</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          
          <?php if ($userlevel=='admin') {
            echo '<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="home.php"><b>Home</b></a>
          </li>';
          }
          else{
            echo '<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="teacher.php"><b>Teacher</b></a>
          </li>';
          }
            ?>
          <li class="nav-item dropdown">
              <a class="nav-link js-scroll-trigger dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i><b>Account</b><i class="caret"></i></a>
                <ul class="dropdown-menu text-warning" style="background-color: inherit;">
                  <li class="nav-item">
                    <a href="accsettings.php"><i class="fa fa-cog" style="font-size: 14px;color:black"> Edit Account Info</a></i>
                  <li class="nav-item">
                    <a href="logout.php"><i class="fa fa-power-off" style="font-size: 14px;color:black"> Logout</a></i>        
                </ul> 
          </li>
      
        </ul>
      </div>
    </div>
  </nav>