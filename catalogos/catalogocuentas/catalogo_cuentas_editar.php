<?php
include_once './CatalogoCuentas.php';
include_once '../gruposcuentas/GruposCuentas.php';
include_once '../../config.php';

$id = filter_input(INPUT_GET, 'idcuenta');

$cata_cuenta = new CatlogoCuentas();
$cuentaid = $cata_cuenta->buscarPorId($id);

foreach ($cuentaid as $cat) {
     $valor_cuenta_contable = $cat['cuentacontable'];
     $valor_grupo_cuenta = $cat['gruposcuenta'];
     $valor_tipo_cuenta = $cat['tipocuenta'];
}
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
                    <div class="block-content collapse in">
                        <form action="catalogo_cuentas_procesar.php" method="POST">
                            <input type="text" value="editar" style="display:none" name="operacion"></input>
                            <input type="text" value=<?php echo $id; ?> style="display:none" name="id_editar"></input>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre de la cuenta</th>
                                <th><input type="text" name="cuenta_contable" placeholder=<?php echo $valor_cuenta_contable; ?>></th>
                            </tr>
                            <tr>
                                <th>Titulo Superior</th>
                                <th>
                                    <span>Actual: <?php echo $valor_grupo_cuenta.'|';?></span>
                                    <span>Nuevo: </span>
                                    <select name="grupo_cuentas">
                                    <?php  
                                    $grup_cuenta = new GruposCuentas();
                                    $grup = $grup_cuenta->leerDatos();
                                    
                                    foreach ($grup as $cat){
                                        echo '<option value="'.$cat['idgrupo'].'">'.$cat['grupo'].'</option>';
                                    }  
                                    ?>    
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th>Tipo Cuenta</th>
                                <th>
                                    <span>Actual: <?php echo $valor_tipo_cuenta.'|';?></span>
                                    <span>Nuevo: </span>
                                    <select name="tipo_cuenta">
                                    <?php  
                                    $tipo_cuenta = new CatlogoCuentas();
                                    $tipo = $tipo_cuenta->listaTipoCuenta();
                                    
                                    foreach ($tipo as $cat){
                                        echo '<option value="'.$cat['idtipocuenta'].'">'.$cat['tipocuenta'].'</option>';
                                    }  
                                    ?>    
                                    </select>
                                </th>
                            </tr>
                        </table>
                         <div class="navbar navbar-inner block-header">
                             <input type="submit" value="      Editar     ">
                        </div>
                      </form>
                    </div>
                    <div class="navbar navbar-inner block-header">
                        <a href="<?php echo INICIO;?>catalogos/catalogocuentas/catalogo_cuentas_lista.php" class="btn btn-success">Volver a lista de Cuentas</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo INICIO;?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo INICIO;?>js/bootstrap.min.js"></script>
    </body>
</html>
