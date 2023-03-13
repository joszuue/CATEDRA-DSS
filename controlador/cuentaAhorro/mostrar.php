<?php
    require_once("../../modelo/cuentaAhorro/daoCuentaBanco.php");

    function misCuentas(){
        $misCuentas = new DaoCuentaBanco(); 
        $Cuentas = $misCuentas->mostrarCuentas($dui);
        ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Número de cuenta</th>
                        <th scope="col">DUI</th>
                        <th scope="col">Titular</th>
                        <th scope="col">Fondos</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($Cuentas as $cuenta){
                            echo "<tr>";
                            echo "<td>".$cuenta['NumCuenta']."</td>";
                            echo "<td>".$cuenta['Dui']."</td>";
                            echo "<td>".$cuenta['Titular']."</td>";
                            echo "<td> $".$cuenta['Fondos']."</td>";
                            echo "<td>".$cuenta['Estado']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        <?php
    }

    function selectCuenta($dui){
        $misCuentas = new DaoCuentaBanco(); 
        $Cuentas = $misCuentas->mostrarCuentas($dui);
        foreach($Cuentas as $cuenta){
            $cuenta2 = $cuenta['NumCuenta'];
            echo "<option value='$cuenta2'>$cuenta2</option>";
        }
    }

    function selectMonto($numCuenta, $monto, $tipo){
        $misCuentas = new DaoCuentaBanco(); 
        $Cuentas = $misCuentas->mostrarMiCuenta($numCuenta);
        if($tipo == "Deposito"){
            foreach($Cuentas as $cuenta){
                $mont = $cuenta['Fondos'];
                $newMonto = $mont + $monto;
            }
        }

        if($tipo == "Retiro"){
            foreach($Cuentas as $cuenta){
                $mont = $cuenta['Fondos'];
                $newMonto = $mont - $monto;
            }
        }

        if($tipo == "Transferencia"){
            foreach($Cuentas as $cuenta){
                $mont = $cuenta['Fondos'];
                $newMonto1 = $mont - $monto;
            }
        }

        return $newMonto;
    }

    function misTransacciones($dui){
        $misCuentas = new DaoCuentaBanco(); 
        $Cuentas = $misCuentas->mostrarCuentas($dui);
        foreach($Cuentas as $cuenta){
            $cuenta2 = $cuenta['NumCuenta'];
            echo "<input class='btn btn-warning' type='submit' name='numCuenta' value=$cuenta2>";
        }
    }

?>