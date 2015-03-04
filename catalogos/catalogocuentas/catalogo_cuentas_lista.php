<!DOCTYPE html>
<!-- inicio 17/02/2015 -->
<?php
include_once './CatalogoCuentas.php';

$cata_cuenta = new CatlogoCuentas();
$cata = $cata_cuenta->leerDatos();
         
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo INICIO; ?>css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <?php include_once '../../menu.php';?>
        <div class="container-fluid">
            <div class="row">
                <div class="span3 well-sm"></div>
                <div class="span3 well">
                    <h4><center>Lista de cuentas</center></h4>
                    <div class="navbar navbar-inner block-header">
                        <a href="<?php echo INICIO;?>catalogos/catalogocuentas/catalogo_cuentas_crear.php" class="btn btn-success">Crear Nueva Cuenta</a>
                        <a href="<?php echo INICIO;?>catalogos/catalogocuentas/catalogo_cuentas_lista_inactivos.php" class="btn btn-success">Lista Cuentas Inactivas</a>
                    </div>
                    <div class="block-content collapse in"> 
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Cuenta contable</th>
                                <th>Grupo cuentas</th>
                                <th>Tipo cuenta</th>
                                <th colspan="2">Acción</th>
                            </tr>
                            <?php
                            
                            if(!empty($cata)){
                            foreach ($cata as $cat) {
                                $id = $cat['idcuentacontable'];
                                echo"
                        <tr>
                        <td>" . $cat['idcuentacontable'] . "</td>
                        <td>" . $cat['cuentacontable'] . "</td>
                        <td>" . $cat['gruposcuenta'] . "</td>
                        <td>" . $cat['tipocuenta'] . "</td>
                        <td>" . '<a href="catalogo_cuentas_editar.php?idcuenta='. $id .'">Editar</a> ' . "</td>
                        <td>" . '<a href="catalogo_cuentas_procesar.php?idcuenta='. $id .'&operacion=inactivar">Inactivar</a>' . "</td>
                        </tr>";
                            }}else{?>
                               
                        </table>
                    </div>
                     <?php echo '<h4>No se encontraron categorias de cuentas</h4>';
                            }
                                                       
                            ?>
                </div>
            </div>
        </div>
        <script src="<?php echo INICIO;?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo INICIO;?>js/bootstrap.min.js"></script>
        <script src="<?php echo INICIO;?>js/categoria_cuentas_inactivar.js"></script>
    </body>
</html>
