<?php
    require_once("../../controlador/cuentaAhorro/mostrar.php");
    require_once("../../modelo/cuentaAhorro/daoTransaccion.php");
    $numCuenta = isset($_POST['numCuenta'])?$_POST['numCuenta']:"";
    $misCuentas = new DaoTransaccion(); 
    $Cuentas = $misCuentas->mostrarTransacciones($numCuenta);
    
    ?>

    <?php
?>
<div class="infocandidato">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"><?php misTransacciones($dui);?></form>
      
        <h1 class="title-2">Lista de Movimientos</h1>
    <div class="expsoftware">
        <table class="table table-dark table-striped" style="margin-top: 1vw">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Numero de Cuenta</th>
                    <th scope="col">Numero de Cuenta Receptora</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($Cuentas as $cuenta){
                        echo "<tr>";
                        echo "<td>".$cuenta['idTransaccion']."</td>";
                        echo "<td>".$cuenta['Tipo']."</td>";
                        echo "<td>".$cuenta['NumCuenta']."</td>";
                        echo "<td>".$cuenta['NumCuentaRecep']."</td>";
                        echo "<td>$".$cuenta['Monto']."</td>";
                        echo "<td>".$cuenta['Fecha']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
                
        </table>
    </div>
    <center>
              
    </center><br /><br>
    
</div>
