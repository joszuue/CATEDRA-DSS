<?php
    require_once("../modelo/daoTransaccion.php");
    $numCuenta = isset($_POST['numCuenta'])?$_POST['numCuenta']:"";
    $misCuentas = new DaoTransaccion(); 
    $Cuentas = $misCuentas->mostrarTransacciones($numCuenta);
    
    ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Número de Cuenta</th>
                        <th scope="col">Número de Cuenta Receptora</th>
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
                            echo "<td> $".$cuenta['NumCuentaRecep']."</td>";
                            echo "<td>".$cuenta['Monto']."</td>";
                            echo "<td>".$cuenta['Fecha']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
    <?php
?>