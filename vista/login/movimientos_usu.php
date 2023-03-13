<?php
  session_start();

  @$sesion = $_SESSION['correo'];

  if($sesion == null || $sesion == ""){
    echo "<script>alert('NO TIENE ACCESO, INICIE SESION')</script>";
    header("location:../../index.html");
    die();
    
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <link rel="icon" type="image/x-icon" href="../assets/images/logofinal.png" /> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Banco AgroBinance</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/movimientousu.css">
    <link rel="stylesheet" href="../assets/css/owl.css">

  </head>

  <body>

  
    <!--<div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  -->

    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="right-icons">
            </ul>
          </div>
        </div>
      </div>
    </div>
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><img class="logonav" src="../Catedra-DSS/assets/images/llogo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registro.php">Creditos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registro.php">Tarjetas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Servicios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../controlador/CtrlCerrar.php">Cerrar Sesion</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
      <div id="perfil">

        <div class="header">
        </div>
      
        <div class="avatar">
        </div>
      
        <div class="opperfil">
        </div>
      
        <?php
          require_once "../../modelo/classUser.php";

          $correo = $_SESSION['correo'];
          $dao = new User();
          $perfiles = $dao->perfil($correo);
          $dui;
          
          foreach($perfiles as $perfil){
            $dui = $perfil['DUI'];
        ?>
      
        <div class="tituloperfil">
          <h1><?php echo $perfil['Nombres'] . " ". $perfil['Apellidos'];?></h1>
          <div class="bigbriefing">
            <p>
              <b>Correo: </b><?php echo $perfil['Correo']; ?> <b>|</b>
              <b>Telefono: </b><?php echo $perfil['Telefono']; ?><b> AQUI NUMERO DE TARJETA SELECCIONADA</b> <b>
            </p>
          </div>
          <div class="smallbriefing">
            <p>
              <b>Sueldo: </b><?php echo $perfil['Sueldo']; ?>
            </p>
          </div>
        </div><br />
        <?php
          }
          //MOSTRAR MOVIMIENTO REALIZADOS
          require_once "mostrarMovimiento.php"
        ?>
      

        <br /><br />
      </div>
    </div>


    <!-- Banner Ends Here -->

    <div class="services" style="background-color:#000">
      <div class="container" >
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2 style="color:#fff">Actividad <em>Financiera</em></h2>
            </div>
            <div class="form-buttons">
            <button id="transaction-button">Transacción</button>
            <button id="deposit-button">Depósito</button>
            <button id="retiro-button">Retiro</button>

            </div>

            <center>
            <!-- Inicio Transaccion -->
            <?php require_once "../../controlador/cuentaAhorro/mostrar.php"; ?>
            <div id="transaction-section" class="form-section">
                <center><h5 style="font-size:40px;">Transacción</h6></center>
              <form id="dentro" action="../../controlador/cuentaAhorro/ctrlCuentaBanco.php" method="POST">
                <label for="sender" >Remitente:</label>
                <div class="dropdown">
                  <select class="btn btn-secondary dropdown-toggle" name="NumCuenta" id="Numcuenta"><?php selectCuenta($dui) ?></select>
                </div>
                <label for="sender" style="text-align: left;">Destinatario:</label>
                
                <div class="input-group flex-nowrap"><br> 
                <span class="input-group-text" id="addon-wrapping">Destinatario</span>
                <input type="number" name="NumRecep" class="form-control" placeholder="Numero de cuenta" aria-label="" aria-describedby="addon-wrapping">
                </div>
                <label for="amount" style="text-align: left;">Monto:</label>
                <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="number" step="0.01" name="monto" class="form-control" aria-label="Amount (to the nearest dollar)">
                <span class="input-group-text">.00</span>
                </div>
                <input type="submit" class="btn btn-dark" name="accion" value="Transferir">
              </form>
              

            </div>
            </center>
            <!-- Fin Transaccion -->

            <!-- Inicio Deposito -->

            <center>
            <div id="deposit-section" class="form-section">
                <center><h5 style="font-size:40px;">Deposito</h6></center>
              <form id="dentro" action="../../controlador/cuentaAhorro/ctrlCuentaBanco.php" method="POST">
                <div class="dropdown">
                  <select class="btn btn-secondary dropdown-toggle" name="NumCuenta" id="Numcuenta"><?php selectCuenta($dui) ?></select>
                </div>
                
                <label for="amount" style="text-align: left;">Monto a depositar:</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">$</span>
                  <input type="number" step="0.01" name="monto" class="form-control" aria-label="Amount (to the nearest dollar)">
                  <span class="input-group-text">.00</span>
                </div>

                <input class="btn btn-dark" type="submit" name="accion" value="Depositar">
              </form>

            </div>
            </center>

            <!-- Fin deposito -->

            <!-- Inicio Retiro -->
            <center>
            <div id="retiro-section" class="form-section">
                <center><h5 style="font-size:40px;">Retiro</h6></center>
              <form id="dentro" action="../../controlador/cuentaAhorro/ctrlCuentaBanco.php" method="POST">
                <div class="dropdown">
                  <select class="btn btn-secondary dropdown-toggle" name="NumCuenta" id="Numcuenta"><?php selectCuenta($dui) ?></select>
                </div>
                <label for="amount" style="text-align: left;">Monto:</label>
                <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="number" step="0.01" name="monto" class="form-control" aria-label="Amount (to the nearest dollar)">
                <span class="input-group-text">.00</span>
                </div>
                <input type="submit" class="btn btn-dark" name="accion" value="Retirar">
              </form>
            

            </div>
            </center>
            <!-- Fin Retiro -->

             <!--
            <center>
            <div id="deposit-section" class="form-section hidden">
              <h2>Depósito</h2>
              <form>
                <label for="account">Cuenta:</label>
                <input type="text" id="account" name="account">
                <label for="amount">Monto:</label>
                <input type="number" id="amount" name="amount">
              </form>
              <button type="button" class="btn btn-dark">Enviar</button>

            </div>
            </center>-->
            
          <script>
            // Obtener los elementos necesarios por sus IDs
            var transactionSection = document.getElementById("transaction-section");
            var transactionButton = document.getElementById("transaction-button");
            var depositButton = document.getElementById("deposit-button");
            var depositSection = document.getElementById("deposit-section");
            var retiroButton = document.getElementById("retiro-button");
            var retiroSection = document.getElementById("retiro-section");
            

            transactionButton.addEventListener("click", function() {
              transactionSection.classList.add("show");
              depositSection.classList.remove("show");
              retiroSection.classList.remove("show");

            });

            depositButton.addEventListener("click", function() {
            // Mostrar el formulario de depósito y ocultar el de transacción
                depositSection.classList.add("show");
                transactionSection.classList.remove("show");
                retiroSection.classList.remove("show");

            });

            retiroButton.addEventListener("click", function() {
            // Mostrar el formulario de depósito y ocultar el de transacción
                retiroSection.classList.add("show");
                transactionSection.classList.remove("show");
                depositSection.classList.remove("show");
            });

          </script>

          </div>
        </div>
      </div>
    </div>


    <!-- Footer-->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-item">
            <h4>Negocios financieros</h4>
            <p>Todos nuestros servicios son respaldados por autoridades legales de la región.</p>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Links usables</h4>
            <ul class="menu-list">
              <li><a href="#">Creditos</a></li>
              <li><a href="#">Tarjetas</a></li>
              <li><a href="#">Servicios</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
                    <h4>Nuestras Redes Sociales</h4>
       <p>Contactanos a  nuestras redes sociales y consulta lo que desees .</p>
                    <ul class="social-icons">
                        <li><a rel="nofollow" href="https://fb.com/templatemo" target="_blank"><i
                                    class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
        </div>
      </div>
    </footer>
    
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright &copy; 2023 Banco AgroBinance.
                        </p>
                </div>
            </div>
        </div>
    </div>
    
   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>
